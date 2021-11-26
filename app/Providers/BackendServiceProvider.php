<?php

namespace App\Providers;

use App\Services\Task\TaskService;
use App\Services\Task\TaskServiceInterface;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {        
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}