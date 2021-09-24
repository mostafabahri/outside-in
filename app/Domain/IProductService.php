<?php

namespace App\Domain;

use Illuminate\Support\Collection;

interface IProductService {

    /**
     * @return Collection<DiscountedProduct>
     **/
    public function getFeaturedProducts(): Collection;
}