<?php

use Faker\Generator as Faker;

$factory->define(App\Info::class, function (Faker $faker) {
    return [
        'id'=>$faker->uuid,
        'cover_title' => $faker->title,
        'cover_body' => $faker->text,
        'cover_img' => $faker->image(),
        'title' => $faker->title,
        'body' => $faker->text,
        'img' => $faker->image(),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'instagram' => $faker->name,
        'telegram' => $faker->name,
        'cell_phone' => $faker->phoneNumber,
        'address' => 'address' . '===>' . $faker->text,
    ];
});
