<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Reservation::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'reservation_number' => $faker->unique()->numerify('RE-########'),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'date' => $faker->date(),
        'time' => $faker->time(),
        'description' => $faker->text,
        'status' => $faker->numberBetween(0, 1),
    ];
});
