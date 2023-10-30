<?php

namespace App\Providers;

use App\Services\Impl\ProdukServiceImpl;
use App\Services\ProdukService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ProdukServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [ProdukService::class => ProdukServiceImpl::class];

    public function provides()
    {
        return [ProdukService::class];
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
