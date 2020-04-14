<?php

namespace Tests\Feature\Common;

use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_account()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $response = $this
            ->actingAs($user , 'api')
            ->get('api/v1/user/account')
            ->assertStatus(201)
        ->getOriginalContent();

        $this->assertEquals($user->id , $response['data']['id']);
    }

}
