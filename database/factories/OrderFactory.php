<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Order::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->toArray();
    $delivery_cost = $faker->numberBetween(0, 20000);
    $discount = $faker->numberBetween(1, 5);
    $sub_total = $faker->randomNumber(5);
    return array(
        'user_id' => $faker->randomElement($users),
        'order_number' => $faker->unique()->numerify('OR-########'),
        'status' => $faker->randomElement(array('not paid', 'being processed', 'ready to take',
            'sending', 'done', 'cancelled')),
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'delivery_method' => $faker->randomElement(array('take away', 'GOFOOD')),
        'delivery_cost' => $delivery_cost,
        'discount' => $discount,
        'sub_total' => $sub_total,
        'total' => $sub_total + $delivery_cost - $discount,
        'note' => $faker->text,
        'expired_date' => $faker->dateTimeBetween('now', '2 hours'),
    );
});
