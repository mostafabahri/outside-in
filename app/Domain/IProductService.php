<?php

namespace App\Domain;

use Illuminate\Support\Collection;

interface IProductService {

    // @return array<DiscountedPrice>
    public function getFeaturedProducts(): Collection;
}