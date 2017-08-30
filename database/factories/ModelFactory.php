<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\friend::class, function (Faker\Generator $faker) {
    static $password;

    return [
        //'name' => $faker->name,
        //'email' => $faker->unique()->safeEmail,
        //'password' => $password ?: $password = bcrypt('secret'),
        //'remember_token' => str_random(10),
        //'username'=> $faker->userName,
        'from_id'=> random_int(1,101),
        //'content'=> $faker->text(random_int(1500,2000)),
        //'privacy'=>random_int(0,1),
        //'likes'=>random_int(500,800),
        'to_id'=>random_int(1,101),
        'status'=>random_int(0,1),
    ];
});
