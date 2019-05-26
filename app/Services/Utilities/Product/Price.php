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
    public function getFormatted($number, $decimals = 2)
    {
        return number_format($number, $decimals);
    }

    public function toFractal($unit)
    {
        return $unit * 100;
    }

    public function toUnit($fractal)
    {
        return static::getFormatted($fractal/100);
    }

    public function present($fractal)
    {
        return config('app.currency') .self::toUnit($fractal);
    }
}
