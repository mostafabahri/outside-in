<?php

namespace App\Http\ViewModels;

use App\Domain\DiscountedProduct;

class ProductViewModel
{
    public function __construct(private DiscountedProduct $product)
    {
    }

    public function summaryText()
    {
        return sprintf("%s ($%0.2f)", $this->product->name, $this->product->unitPrice);
    }
}