<?php

namespace App\Infrastructure;

use App\Domain\IProductRepository;
use App\Domain\Product;
use App\Models\Product as ModelsProduct;
use Illuminate\Support\Collection;

class SqlProductRepository implements IProductRepository
{
	/**
	 * The interface for data access.
	 *
	 * @return Collection<Product>
	 **/
	public function getFeaturedProducts(): Collection
	{
		return ModelsProduct::query()->featured()->get()
			->map->toDomain();
	}
}
