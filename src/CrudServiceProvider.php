<?php

namespace Athiq\Bondsteinscrud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider{

    public function register()
    {

    }


    public function boot()
    {
            $this->loadRoutesFrom(__DIR__.'/routes/crud_route.php');
            $this->loadViewsFrom(__DIR__.'/views/crud','crud');
            $this->loadMigrationsFrom(__DIR__.'/database/migrations');
            $this->publishes([
                __DIR__.'/views/crud' => resource_path('views/vendor/crud'),
            ]);
            $this->publishes([
                __DIR__.'/database/migrations' => database_path('migrations')
            ], );

             // Check if the routes should be published
             if ($this->app->runningInConsole()) {
                $this->publishes([
                    __DIR__.'/routes' => base_path('routes/vendor/crud_route.php'),
                    __DIR__.'/models' => app_path('Models'),
                    __DIR__.'/Http/controllers' => app_path('Http/Controllers'),
                    // ... add more paths for views, validation files, etc.
                ],);
            }


    }
}



?>
