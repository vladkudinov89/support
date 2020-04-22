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
    /** @test */
    public function get_review_to_current_support()
    {
        $admin = factory(User::class)->create(['role' => 'admin']);
        $user = factory(User::class)->create(['role' => 'user']);

        $support = factory(Support::class)->create(['user_id' => $user->id]);

        $reviews = factory(Review::class, 2)->create([
            'user_id' => $user->id,
            'support_id' => $support->id
        ]);

        $response = $this
            ->actingAs($user, 'api')
            ->get('api/v1/review/' . $user->id . '/' . $support->id)
            ->assertStatus(201)
            ->getOriginalContent();

        for ($i = 0; $i < count($reviews); $i++) {
            $this->assertEquals($reviews[$i]['id'], $response['data'][$i]['id']);
            $this->assertEquals($reviews[$i]['description'], $response['data'][$i]['description']);
            $this->assertEquals($reviews[$i]['user_id'], $response['data'][$i]['user_id']);
            $this->assertEquals($reviews[$i]['support_id'], $response['data'][$i]['support_id']);
        }
    }

    use RefreshDatabase;
}
