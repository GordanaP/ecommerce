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
        Blade::component('components.links.admin_sidebar', 'admin_side_link');
        Blade::component('components.headers.admin_show_header', 'admin_show_header');
        Blade::component('components.headers.admin_save_header', 'admin_save_header');
        Blade::component('components.headers.datatable_header', 'datatable_header');
        Blade::component('components.presentables.timestamps', 'timestamps');
        Blade::component('components.presentables.identifier', 'identifier');
        Blade::component('components.presentables.related_products', 'related_products');
    }
}
