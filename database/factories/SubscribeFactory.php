<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\Models\Subscribe;
use Faker\Generator as Faker;

$factory->define(App\Models\Subscribe::class, function (Faker $faker) {
    return [
        "first_name"=>$faker->firstName,
        "last_name"=>$faker->lastName,
        "email"=>$faker->unique()->safeEmail,
        "birthday"=>$faker->dateTimeThisCentury->format('Y-m-d')
    ];
});
