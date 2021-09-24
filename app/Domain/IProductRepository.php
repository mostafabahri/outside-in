<?php

namespace App\Domain;

use Illuminate\Support\Collection;

interface IProductRepository {

    /**
     * The interface for data access.
     *
     * @return Collection<Product>
     **/
    public function getFeaturedProducts(): Collection;
}