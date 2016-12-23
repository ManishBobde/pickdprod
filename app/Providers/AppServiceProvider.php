<?php

namespace App\Providers;

use App\PublishedPost;
use Illuminate\Support\ServiceProvider;
use PD\Observers\PostObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        PublishedPost::observe(PostObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
