<?php

/** @var Factory $factory */

use App\Entities\Support;
use App\Entities\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Support::class, function (Faker $faker) {
    return [
        'title' => $faker->words('3' , true),
        'message' => $faker->text('100'),
        'status' => Support::STATUS_ACTIVE,
        'user_id' => factory(User::class)->create()->id
    ];
});
