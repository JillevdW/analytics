<?php

namespace Jvdw\Analytics;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        $this->registerRoutes();
        $this->registerViews();
    }
    
    /**
     * Register the package's migrations.
     *
     * @return void
     */
    private function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/Storage/migrations');
        }
    }

    /**
     * Register the package's routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->apiRouteConfiguration(), function() {
            $this->loadRoutesFrom(__DIR__.'/Http/routes/api.php');
        });
        });
    }

    /**
     * Get the Analytics route group configuration array for the api routes.
     *
     * @return array
     */
    private function apiRouteConfiguration() {
        // TODO: Add middleware to this route configuration.
        return [
            'namespace' => 'Jvdw\Analytics\Http\Controllers\API',
            'prefix' => 'app-analytics-api'
        ];
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }
    
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            Console\AddAppMetric::class,
        ]);
        $this->registerEloquentFactoriesFrom(__DIR__.'/Storage/factories');
    }
}