<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    $name=$faker->name;
     $login=$faker->login;
    return [
        'login' => $faker->login,
        'name'=>$faker->name,
        'last_name'=>$faker->last_name,
        'gender'=>'male',
        'dirthdate_day'=>$faker->dirthdate_day,
        'dirthdate_month'=>$faker->dirthdate_month,
        'dirthdate_year'=>$faker->dirthdate_year,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
