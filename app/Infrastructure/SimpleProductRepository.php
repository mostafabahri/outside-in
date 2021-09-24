<?php

namespace App\Infrastructure;

use App\Domain\IProductRepository;
use App\Domain\Product;
use Illuminate\Support\Collection;

class SimpleProductRepository implements IProductRepository
{
	private Collection $db;

	public function __construct($items = null)
	{
		$items = collect($items);
		$this->db = filled($items) ? $items : collect([
			new Product('Criollo Chocolate', 39.45),
			new Product('Gruyere', 48.50),
			new Product('White Asparguras', 29.99),
			new Product('Anchovoris', 19.99),
			new Product('Arborio Rice', 22.75),
			new Product('Vanila', 10),
		]);
	}

	/**
	 * The interface for data access.
	 *
	 * @return Collection<Product>
	 **/
	public function getFeaturedProducts(): Collection
	{
		return $this->db->filter(fn (Product $product) => $product->isFeatured);
	}
}
