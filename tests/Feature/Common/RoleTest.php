<?php

namespace Tests\Feature\Common;

use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_admin_role()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
//$this->withoutExceptionHandling();
        $response = $this
            ->actingAs($user , 'api')
            ->get('api/v1/role/user')
            ->assertStatus(201)
            ->assertHeader('Content-Type', 'application/json');
    }
}
