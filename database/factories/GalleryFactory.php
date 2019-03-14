<?php

use Faker\Generator as Faker;

$factory->define(App\Gallery::class, function (Faker $faker) {

    return [
        'gallery_name' => $faker->name,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'location' => $faker->city,
        'type' => $faker->shuffleArray(['چوب', 'چرم', 'سفال']),
    ];
});
