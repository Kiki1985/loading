<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subscription;
use Faker\Generator as Faker;


$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'avatar' => $faker->image('public/storage/images',400,300, null, false) 
    ];
});
