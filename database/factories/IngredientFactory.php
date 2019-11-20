<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Ingredient::class, function (Faker $faker) {
    $products = DB::table('products')->pluck('id')->toArray();
    return [
        'product_id' => $faker->randomElement($products),
        'name' => $faker->name,
        'price' => $faker->numberBetween(10000, 70000),
        'active' => $faker->numberBetween(0, 1),
    ];
});
