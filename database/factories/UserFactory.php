<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt('123456'),
        'pokemon' => $faker->name,
        'codigo' => rand(10000000, 99999999),
    ];
});
