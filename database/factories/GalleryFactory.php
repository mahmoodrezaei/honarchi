<?php

use Faker\Generator as Faker;

$factory->define(App\Gallery::class, function (Faker $faker) {

    return [
        'gallery_name' => $faker->name,

        'location' => $faker->city,
        'type' => $faker->shuffleArray(['چوب', 'چرم', 'سفال']),
    ];
});
