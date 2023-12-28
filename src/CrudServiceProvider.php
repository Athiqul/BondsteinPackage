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

    }
}



?>
