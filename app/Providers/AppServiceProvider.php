<?php

namespace App\Providers;

use App\Contracts\CategoriaInterface;
use App\Contracts\InventarioInterface;
use App\Contracts\ProductoInterface;
use App\Services\CategoriaService;
use App\Services\InventarioService;
use App\Services\ProductoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoriaInterface::class, CategoriaService::class);
        $this->app->bind(ProductoInterface::class, ProductoService::class);
        $this->app->bind(InventarioInterface::class, InventarioService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
