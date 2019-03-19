<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'category_id' => null,
        'gallery_id' => null,
        'code' => $faker->unique()->bankAccountNumber,
        'name' => $faker->name,
        'intro' => $faker->sentence,
        'description' => $faker->text,
        'purchase_price' => (string) $faker->numberBetween(1000, 90000),
        'price' => (string) $faker->numberBetween(1000, 9000000),
        'special_price' => (string) $faker->numberBetween(1000, 9000),
        'major_price' => (string) $faker->numberBetween(1000, 9000),
        'no' => $faker->randomNumber(),
        'major_no' => $faker->randomNumber(2),
        'features' => [
                                        'color' => $faker->colorName,
                                        'material' => $faker->firstName
                                    ],
        'location' => $faker->city,
        'pics' => [
            $faker->image(storage_path('app/public/products'), 640, 480),
            $faker->image(storage_path('app/public/products'), 640, 480),
        ],
        'rate' => 0,
        'max_purchase_per_rate' => 10,
    ];
});
