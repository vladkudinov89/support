<?php

namespace Tests\Feature;

use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauth_user_cannot_see_homepage()
    {
       $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function auth_user_can_see_homepage()
    {
        $user = factory(User::class)->create();

        $response =
            $this->actingAs($user)
                ->get('/cabinet')
                ->assertSuccessful();
    }


}
