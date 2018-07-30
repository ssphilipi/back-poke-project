<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Trainer::class, function (Faker $faker) {
    return [
      'nome' => $faker->name,
      'pokemon' => $faker->name,
      'codigo' => rand(10000000, 99999999),
      'user_id' => rand(1, User::count()),
    ];
});
