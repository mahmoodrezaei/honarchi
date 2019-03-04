<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'id'=>$faker->uuid,
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'subject' => $faker->title,
        'description' => 'test' . '===>' . $faker->text,
    ];
});
