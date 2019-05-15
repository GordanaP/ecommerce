<?php

use App\Brand;
use App\Category;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 20)->create()->each(function($product){

            $category = Category::inRandomOrder()->first();
            $brand = Brand::inRandomOrder()->first();

            $product->category()->associate($category)->save();
            $product->brand()->associate($brand)->save();
        });
    }
}
