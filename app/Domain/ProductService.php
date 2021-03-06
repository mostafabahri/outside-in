<?php

namespace App\Domain;

use Illuminate\Support\Collection;

class ProductService implements IProductService
{

    public function __construct(private IProductRepository $repository, private IUserContext $userContext)
    {
    }
    /**
     * Get featured products.
     * 
     * @return Collection<DiscountedProduct>
     **/
    public function getFeaturedProducts(): Collection
    {
        return $this->repository
            ->getFeaturedProducts()
            ->map->applyDiscountFor($this->userContext);
    }
}
