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
            ->pipeInto(FeaturedProductViewModel::class);

        return view('home', ['model' => $model]);
    }
}
class FeaturedProductViewModel
{
    public function __construct(private $products)
    {
    }

    public function products()
    {
        return $this->products;
    }
}
