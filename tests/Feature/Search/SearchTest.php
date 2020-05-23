<?php

namespace Tests\Feature\Search;

use App\Entities\Support;
use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function search_support()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $supports = factory(Support::class, 5)->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user, 'api')
            ->get('api/v1/admin/supports/search?q=' . substr($supports[0]->title , 0 , 3))
            ->assertHeader('Content-Type', 'application/json');

        foreach ($response['data'] as $datum) {
            $this->assertEquals( $supports[0]->title , $datum->title );
        }
    }

}
