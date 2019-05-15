<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait HasDate
{
    public function getCreationDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getLastChangeDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}