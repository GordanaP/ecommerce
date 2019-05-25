<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id' => $id = Customer::inRandomOrder()->first()->id,
        'number' => $faker->unique()->randomNumber($nbDigits = 8),
        'subtotal' => $subtotal = rand(1000, 100000),
        'tax' => $tax = $subtotal * 0.2,
        'total' => $subtotal + $tax,
    ];
});
