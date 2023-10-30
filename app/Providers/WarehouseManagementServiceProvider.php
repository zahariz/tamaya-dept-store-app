<?php

namespace App\Providers;

use App\Services\Impl\WarehouseManagementServiceImpl;
use App\Services\WarehouseManagementService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class WarehouseManagementServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [WarehouseManagementService::class => WarehouseManagementServiceImpl::class];

    public function provides()
    {
        return [WarehouseManagementService::class];
    }

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
