<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    static $password;
    $image = $faker->image(public_path('image'));
    $image = str_replace(public_path(), '', $image);
    return [
        'name' => $faker->name,
        'username' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'image' => $image,
        'phone' => $faker->phoneNumber,
        'enabled' => $faker->randomElement(['0', '1']),

    ];

});
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});