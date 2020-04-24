<?php

namespace Tests\Feature\Review;

use App\Entities\Review;
use App\Entities\Support;
use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_review_to_current_support()
    {
        $admin = factory(User::class)->create(['role' => 'admin']);
        $user = factory(User::class)->create(['role' => 'user']);

        $support = factory(Support::class)->create(['user_id' => $user->id]);

        $reviewsUser = factory(Review::class, 2)->create([
            'user_id' => $user->id,
            'support_id' => $support->id
        ]);

        $reviewsAdmin = factory(Review::class, 2)->create([
            'user_id' => $admin->id,
            'support_id' => $support->id
        ]);

        $response = $this
            ->actingAs($user, 'api')
            ->get('api/v1/review/'. $support->id)
            ->assertStatus(201);

        $this->checkJsonStructure($response);

        for ($i = 0; $i < count($reviewsUser); $i++) {
            $this->assertEquals($reviewsUser[$i]->id, $response['data'][$i]['id']);
            $this->assertEquals($reviewsUser[$i]->description, $response['data'][$i]['description']);
            $this->assertEquals($reviewsUser[$i]->user->role, $response['data'][$i]['user_role']);
        }

        for ($i = 2; $i < count($reviewsAdmin); $i++) {
            $this->assertEquals($reviewsAdmin[$i]->id, $response['data'][$i]['id']);
            $this->assertEquals($reviewsAdmin[$i]->description, $response['data'][$i]['description']);
            $this->assertEquals($reviewsAdmin[$i]->user->role, $response['data'][$i]['user_role']);
        }
    }

    public function checkJsonStructure($response)
    {
        $response->assertJsonStructure(
            ['data' =>
                ['*' =>
                    [
                        'id',
                        'description',
                        'created_at',
                        'user_role'
                    ]
                ]
            ]);
    }
}
