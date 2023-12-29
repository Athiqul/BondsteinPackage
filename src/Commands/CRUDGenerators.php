<?php
// your-package/src/Commands/CRUDGenerator.php

namespace Athiq\Bondsteinscrud\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CRUDGenerator extends Command
{
    protected $signature = 'make:crud {name}';
    protected $description = 'Generate CRUD files for a model';

    public function handle()
    {
        $modelName = $this->argument('name');

        // Generate model
        Artisan::call('make:model', ['name' => $modelName]);

        // Generate controller
        Artisan::call('make:controller', ['name' => "{$modelName}Controller"]);

        // Generate views
        $this->generateViews($modelName);

        // Generate validation request
        Artisan::call('make:request', ['name' => "{$modelName}Request"]);

        // Generate migration
        Artisan::call('make:migration', ['name' => "create_{$modelName}_table"]);

        // Generate routes
        $this->updateRoutesFile($modelName);

        $this->info("CRUD for model '{$modelName}' generated successfully!");
    }

    private function generateViews($modelName)
    {
        // Implement your logic to generate views (e.g., using stubs)
        // You can create a ViewsGenerator class or use File and Stub classes
    }

    private function updateRoutesFile($modelName)
    {
        // Implement your logic to update the routes file
        // You can use File or other methods to append routes to the web.php file
        // Example:
        $routes = "
Route::resource('{$modelName}', '{$modelName}Controller');
        ";
        file_put_contents(base_path('routes/web.php'), $routes, FILE_APPEND);
    }
}


?>
