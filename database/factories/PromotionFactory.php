<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    $start_date = $faker->dateTime;
    return [
        'coupon' => $faker->lexify('??????'),
        'title' => $faker->title,
        'description' => $faker->text,
        'start_date' => $start_date,
        'end_date' => $faker->dateTimeBetween($start_date, '7 days'),
        'minimum_payment' => $faker->numberBetween(0, 30000),
        'discount' => $faker->numberBetween(1, 5),
        'image_path' => $faker->image('public/storage/images', 400, 300, null, false),
        'active' => $faker->numberBetween(0, 1),
    ];
});
