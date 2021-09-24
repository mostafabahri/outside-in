<?php

namespace App\Providers;

use App\Domain\DiscountedProduct;
use App\Domain\IProductRepository;
use App\Domain\IProductService;
use App\Domain\ProductService;
use App\Http\ViewModels\ProductViewModel;
use App\Infrastructure\SimpleProductRepository;
use Illuminate\Support\Collection;
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
