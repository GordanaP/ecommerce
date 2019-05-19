<?php

namespace App\Services\Utilities\Product;

class Price
{
    /**
     * Format number to float.
     *
     * @param  integer  $number
     * @param  integer $decimals
     * @return float
     */
    public static function toFloat($number, $decimals = 2)
    {
        return number_format($number, $decimals);
    }
}
