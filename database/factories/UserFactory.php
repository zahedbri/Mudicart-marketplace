<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserLevel;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    $username = $faker->unique()->username;
    $level_pool = collect(UserLevel::LEVELS)->except(UserLevel::SUPERADMIN)->keys();

    return [
        'username' => $username,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'level' => $faker->randomElement($level_pool),
        'email_verified_at' => now(),
        'password' => Hash::make($username),
        'remember_token' => str_random(10),
    ];
});
