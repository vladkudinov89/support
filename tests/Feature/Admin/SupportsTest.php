<?php

namespace Tests\Feature\Admin;


use App\Entities\Review;
use App\Entities\Support;
use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_supports_by_admin()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $supports = factory(Support::class, 2)->create(['user_id' => $user->id]);

        $reviews = factory(Review::class , 3)->create([
            'user_id' => $user,
            'support_id' => $supports[0]->id
            ]);

        $response = $this
            ->actingAs($user, 'api')
            ->get('api/v1/admin/supports')
            ->assertStatus(201)
            ->assertHeader('Content-Type', 'application/json');

        $this->checkJsonStructure($response);

        for ($i = 0; $i < count($supports); $i++) {
            $this->assertEquals($supports[$i]->id, $response['data'][$i]['id']);
            $this->assertEquals($supports[$i]->title, $response['data'][$i]['support_title']);
            $this->assertEquals($supports[$i]->message, $response['data'][$i]['support_message']);
            $this->assertEquals($supports[$i]->user_id, $response['data'][$i]['support_user_id']);
        }
    }

    /** @test */
    public function update_support_by_admin()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $supports = factory(Support::class, 3)->create();

        $data = [
            'title' => 'test title',
            'message' => 'test message',
            'status_activities' => 'closed',
            'status_view' => 'viewed'
        ];

        $response = $this
            ->actingAs($user, 'api')
            ->put('api/v1/admin/supports/' . $supports[0]->id, $data)
            ->assertStatus(201);

        $this->assertDatabaseHas('supports', $data);
    }

    /** @test */
    public function success_delete_support_by_admin()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $supports = factory(Support::class, 3)->create();

        $response = $this
            ->actingAs($user, 'api')
            ->delete('api/v1/admin/supports/' . $supports[0]->id)
            ->assertStatus(201);

        $this->assertDatabaseMissing('supports', $supports[0]->toArray());
    }

    /** @test */
    public function admin_change_status_support_to_view()
    {
        $admin = factory(User::class)->create(['role' => 'admin']);

        $supports = factory(Support::class)->create(['status_view' => 'unviewed']);

        $response = $this
            ->actingAs($admin, 'api')
            ->put('api/v1/admin/supports/viewed/' . $supports->id)
            ->assertStatus(201)
            ->getOriginalContent();

        $this->assertEquals(Support::STATUS_VIEWED, $response['data']['status_view']);
        $this->assertEquals($admin->id, $response['data']['admin_id_accept_exec']);
    }


    public function checkJsonStructure($response)
    {
        $response->assertJsonStructure(
            ['data' =>
                ['*' =>
                    [
                        'id',
                        'support_title',
                        'support_message',
                        'support_status_active',
                        'support_status_view',
                        'support_user_name',
                        'support_user_role',
                    ]
                ]
            ]);
    }

}
