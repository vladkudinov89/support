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
    public function get_all_supports()
    {
        $user = factory(User::class)->create();

        $supports = factory(Support::class, 10)->create();

        $response = $this
            ->actingAs($user , 'api')
            ->get('api/v1/admin/supports')
            ->assertSuccessful()
            ->getOriginalContent();

        for($i = 0;$i > count($supports);$i++){
            $this->assertEquals( $supports[0]->title, $response[0]->title);
            $this->assertEquals( $supports[0]->message, $response[0]->message);
            $this->assertEquals( $supports[0]->status, $response[0]->status);
        }
    }

}
