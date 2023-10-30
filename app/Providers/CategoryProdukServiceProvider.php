<?php

namespace App\Providers;

use App\Services\CategoryProdukService;
use App\Services\Impl\CategoryProdukServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CategoryProdukServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [CategoryProdukService::class => CategoryProdukServiceImpl::class];

    public function provides() {
        return [CategoryProdukService::class];
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
