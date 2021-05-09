<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class MetroPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
