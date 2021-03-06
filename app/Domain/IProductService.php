<?php

namespace App\Domain;

use Illuminate\Support\Collection;

interface IProductService {

    /**
     * Get featured products.
     * 
     * @return Collection<DiscountedProduct>
     **/
    public function getFeaturedProducts(): Collection;
}