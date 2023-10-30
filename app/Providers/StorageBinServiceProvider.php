<?php

namespace App\Providers;

use App\Services\Impl\StorageBinServiceImpl;
use App\Services\StorageBinService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class StorageBinServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [StorageBinService::class => StorageBinServiceImpl::class];

    public function provides()
    {
        return [StorageBinService::class];
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
