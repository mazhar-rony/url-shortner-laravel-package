<?php
namespace Pondit\UrlShortner;

use Illuminate\Support\ServiceProvider;


class UrlShortnerServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'url-shortner');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}