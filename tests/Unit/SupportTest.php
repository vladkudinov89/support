<?php

namespace Tests\Unit;

use App\Entities\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function success_add_support()
    {
        $support = factory(Support::class)->create([
            'title' => 'test',
            'message' => 'test message'
        ]);

        $this->assertEquals('test' , $support->title);
        $this->assertEquals('test message' , $support->message);
    }

}
