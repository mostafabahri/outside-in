<?php

namespace App\Http\Controllers;

use App\Domain\IProductService;
use App\Http\ViewModels\ProductViewModel;

class HomeController extends Controller
{
    public function __invoke(IProductService $productService)
    {
        $model = $productService->getFeaturedProducts()
            ->mapInto(ProductViewModel::class)
            ->pipeInto(FeaturedProductsViewModel::class);

        return view('home', compact('model'));
    }
}
class FeaturedProductsViewModel
{
    public function __construct(private $products)
    {
    }

    public function products()
    {
        return $this->products;
    }
}
