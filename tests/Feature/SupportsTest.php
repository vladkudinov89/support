<?php

namespace Tests\Feature;


use App\Entities\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_supports()
    {
        $supports = factory(Support::class, 10)->create();

        $response = $this->get('api/v1/supports')
            ->assertSuccessful()
            ->getOriginalContent();

        for($i = 0;$i > count($supports);$i++){
            $this->assertEquals( $supports[0]->title, $response[0]->title);
            $this->assertEquals( $supports[0]->message, $response[0]->message);
            $this->assertEquals( $supports[0]->status, $response[0]->status);
        }
    }

}
