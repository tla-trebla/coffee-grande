<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Payment::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->toArray();
    return [
        'order_id' => $faker->unique()->numberBetween(1, DB::table('orders')->count()),
        'user_id' => $faker->randomElement($users),
        'bank' => $faker->randomElement(array('BCA', 'BRI', 'Mandiri',
            'BNI', 'Maybank BII', 'Other')),
        'card_number' => $faker->bankAccountNumber,
        'card_name' => $faker->name,
    ];
});
