<?php

namespace App\Providers;

use App\Domain\IProductRepository;
use App\Domain\IProductService;
use App\Domain\IUserContext;
use App\Domain\ProductService;
use App\Http\HttpUserContextAdapter;
use App\Infrastructure\SimpleProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            IProductService::class,
            ProductService::class
        );
        $this->app->bind(
            IProductRepository::class,
            SimpleProductRepository::class
        );

        $this->app->bind(
            IUserContext::class,
            HttpUserContextAdapter::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
