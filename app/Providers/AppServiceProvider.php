<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Socialmedia;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*', function($view) {
            $view->with('menu_categories', Category::with('children'));
            $view->with('menu_tags', Tag::get());
            $view->with('socials', Socialmedia::all());
        });
    }
}
