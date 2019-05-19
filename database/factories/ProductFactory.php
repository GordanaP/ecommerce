<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Brand;
use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'price' => rand(1, 100),
        'category_id' => Category::inRandomOrder()->first()->id,
        'brand_id' => Brand::inRandomOrder()->first()->id,
    ];
});
