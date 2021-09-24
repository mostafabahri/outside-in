<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'model' => new FeaturedProductViewModel([
                new ProductViewModel('Criollo Chocolate', 39.45),
                new ProductViewModel('Gruyere', 48.50),
                new ProductViewModel('White Asparguras', 29.99),
                new ProductViewModel('Anchovoris', 19.99),
                new ProductViewModel('Arborio Rice', 22.75)
            ])
        ]);
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
class ProductViewModel
{
    public function __construct(private $name, private $unitPrice)
    {
    }

    public function summaryText()
    {
        return sprintf("%s ($%0.2f)", $this->name, $this->unitPrice);
    }
}
