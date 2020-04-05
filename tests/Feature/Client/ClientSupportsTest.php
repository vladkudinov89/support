<?php

namespace Tests\Feature\Client;


use App\Entities\Support;
use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientSupportsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_user_supports()
    {
        $user = factory(User::class)->create();

        $supports = factory(Support::class, 10)->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->get('api/v1/client/supports')
            ->assertSuccessful()
            ->getOriginalContent();

        for($i = 0;$i > count($supports);$i++){
            $this->assertEquals( $supports[0]->title, $response[0]->title);
            $this->assertEquals( $supports[0]->message, $response[0]->message);
            $this->assertEquals( $supports[0]->status, $response[0]->status);
        }
    }

}
