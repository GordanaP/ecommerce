<?php

namespace App\Observers;

use Keygen\Keygen;

class OrderObserver
{
    /**
     * Listen to the Order creating event.
     *
     * @param  \App\Model $model
     * @return void
     */
    public function creating($model)
    {
        $model->number =  Keygen::numeric(7)->prefix('#')->generate(true);
    }
}