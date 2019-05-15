<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.tables.datatable', 'datatable');
        Blade::component('components.tables.datatable_header', 'datatable_header');
        Blade::component('components.links.admin_sidebar', 'admin_side_link');
    }
}
