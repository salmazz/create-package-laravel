<?php

namespace Salmazz\Todolist;

use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->make('Salmazz\Http\Controllers\Todolist\TaskController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'todolist');
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views'),
        ]);
    }
}
