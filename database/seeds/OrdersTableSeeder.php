<?php

use App\Order;
use App\Product;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Order', 1)->create();

        $order = Order::first();
        $products = Product::take(rand(1,3))->inRandomorder()->get();

        foreach ($products as $product) {

            $order->products()->attach($product->id, [
                'quantity' => rand(1,5),
                'price' => $product->price,
            ]);
        }
    }
}
