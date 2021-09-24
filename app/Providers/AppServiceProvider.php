<?php

namespace App\Providers;

use App\Domain\DiscountedProduct;
use App\Domain\IProductService;
use App\Http\ViewModels\ProductViewModel;
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
        //
        $this->app->bind(
            IProductService::class,
            fn () => new class  implements IProductService
            {
                public function getFeaturedProducts(): Collection
                {
                    return collect([
                        new DiscountedProduct('Criollo Chocolate', 39.45),
                        new DiscountedProduct('Gruyere', 48.50),
                        new DiscountedProduct('White Asparguras', 29.99),
                        new DiscountedProduct('Anchovoris', 19.99),
                        new DiscountedProduct('Arborio Rice', 22.75)
                    ]);
                }
            }
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
