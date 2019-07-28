<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\User;
use App\Donate;
use App\State;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];

});


$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role' => $faker->numberBetween(1, 2),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];

});

$factory->define(State::class, function (Faker $faker) {
    return [
        'amount' => $faker->randomNumber(4),
        'current_amount' => $faker->randomNumber(4),
        'description' => $faker->text(200),
        'admin_id' => function () {
            return factory(App\Admin::class)->create()->id;
        },
    ];

});


$factory->define(Donate::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'state_id' => function () {
            return factory(App\State::class)->create()->id;
        },
        'amount' => $faker->randomNumber(4),
        'approval' => $faker->numberBetween(0, 1),
    ];

});
