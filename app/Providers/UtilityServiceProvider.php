<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Utilities\Product\Price;
use App\Services\Utilities\ShoppingCart\ShoppingCart;

class UtilityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Register a binding of a class with a related container.
         */
        $this->app->bind('product-price', function() {
            return new Price();
        });

        $this->app->bind('my-message', function() {
            return new Message();
        });

        $this->app->bind('shopping-cart', function() {
            return new ShoppingCart();
        });
    }
}
