<?php

namespace Tests\Feature\Client;


use App\Entities\Support;
use App\Entities\User;
use App\Policies\SupportPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientSupportsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_client_supports()
    {
        $user = factory(User::class)->create();

        $supports = factory(Support::class, 15)->create();

        $supports_user = factory(Support::class, 5)->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user, 'api')
            ->get('api/v1/client/support/' . $user->id)
            ->assertStatus(201)
            ->getOriginalContent();

        $this->assertEquals(5, count($response['data']));

        for ($i = 0; $i > count($supports); $i++) {
            $this->assertEquals($supports[0]->title, $response[0]->title);
            $this->assertEquals($supports[0]->message, $response[0]->message);
            $this->assertEquals($supports[0]->status, $response[0]->status);
        }
    }

    /** @test */
    public function client_can_get_own_single_support()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $supports_user = factory(Support::class, 3)->create(['user_id' => $user->id]);

        $this->withoutExceptionHandling();

        $response = $this
            ->actingAs($user, 'api')
            ->get('api/v1/client/support/' . $user->id . '/' . $supports_user[0]->id)
            ->assertStatus(201)
            ->getOriginalContent();

        $this->assertEquals($supports_user[0]->id, $response['data']['id']);
    }


    /** @test */
    public function client_can_update_own_support()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $supports = factory(Support::class, 3)->create(['user_id' => $user->id]);

        $data = [
            'title' => 'test title',
            'message' => 'test message',
            'status_activities' => 'closed',
            'status_view' => 'viewed'
        ];

        $response = $this
            ->actingAs($user, 'api')
            ->put('api/v1/client/supports/' . $supports[0]->id, $data)
            ->assertStatus(201);

        $this->assertDatabaseHas('supports', $data);
    }

    /** @test */
    public function success_delete_support_by_client()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $supports = factory(Support::class, 3)->create();

        $response = $this
            ->actingAs($user , 'api')
            ->delete('api/v1/client/supports/' . $supports[0]->id)
            ->assertStatus(201);

        $this->assertDatabaseMissing('supports' ,$supports[0]->toArray() );
    }


}
