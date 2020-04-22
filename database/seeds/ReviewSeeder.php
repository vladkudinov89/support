<?php

use App\Entities\Review;
use App\Entities\Support;
use App\Entities\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supports = Support::all();

        $supports->map(function ($support) {
           factory(Review::class)->create([
              'user_id' => User::all()->random()->id,
              'support_id' => $support->id
           ]);
        });
    }
}
