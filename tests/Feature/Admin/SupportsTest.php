<?php

namespace Tests\Feature\Admin;


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
        $user = factory(User::class)->create();

        $supports = factory(Support::class, 10)->create();

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
