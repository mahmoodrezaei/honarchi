<?php

use Faker\Generator as Faker;

$factory->define(App\Feature::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->name,
        'slug' => str_slug($name),
        'key_id' => null,
    ];
});
