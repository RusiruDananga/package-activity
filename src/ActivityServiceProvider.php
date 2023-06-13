<?php
namespace RusiruD\Activity;
use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','activity');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->publishes([
            
            __DIR__ . '/views' => resource_path('views/vendor/activity'),
        
        ]);

    }
    public function register(){
 
    }
}