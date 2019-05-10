<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // $categories = Category::orderBy('name', 'asc')->get();

        // View::composer('admin.partials._sidebar', function($view) use($categories) {
        //     $view->with(compact('categories'));
        // });
    }
}
