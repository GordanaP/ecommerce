<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ShoppingCart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shopping-cart';
    }
}