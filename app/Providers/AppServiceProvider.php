<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Services\ApiService;
use App\Services\ConfigService;
use App\Services\Contracts\ApiServiceContract;
use App\Services\Contracts\ConfigServiceContract;
use App\Services\Contracts\InstallationServiceContract;
use App\Services\Contracts\OrdersServiceContract;
use App\Services\InstallationService;
use App\Services\OrdersService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const CONTRACTS = [
        ApiServiceContract::class => ApiService::class,
        ConfigServiceContract::class => ConfigService::class,
        OrdersServiceContract::class => OrdersService::class,
        InstallationServiceContract::class => InstallationService::class,
    ];

    public function boot(): void
    {
        OrderResource::withoutWrapping();
        ProductResource::withoutWrapping();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach (self::CONTRACTS as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }

        /*
         * Local register of ide helper.
         * Needs to be full path.
         */
        if ($this->app->isLocal()) {
            $this->app->register('\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
        }
    }
}
