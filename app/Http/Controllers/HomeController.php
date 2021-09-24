<?php

namespace App\Http\Controllers;

use App\Domain\IProductService;
use App\Http\ViewModels\ProductViewModel;

class HomeController extends Controller
{
    public function __invoke(IProductService $productService)
    {
        // new FeaturedProductViewModel([
        //                 new ProductViewModel('Criollo Chocolate', 39.45),
        //                 new ProductViewModel('Gruyere', 48.50),
        //                 new ProductViewModel('White Asparguras', 29.99),
        //                 new ProductViewModel('Anchovoris', 19.99),
        //                 new ProductViewModel('Arborio Rice', 22.75)
        //             ])
        // ];

        $model = $productService->getFeaturedProducts()
            // ->mapInto(ProductViewModel::class)
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
