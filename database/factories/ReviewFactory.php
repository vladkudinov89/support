<?php

/** @var Factory $factory */

use App\Entities\Review;
use App\Entities\Support;
use App\Entities\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(),
        'support_id' => function () {
            return factory(Support::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
