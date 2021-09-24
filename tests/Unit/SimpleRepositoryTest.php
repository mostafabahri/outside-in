<?php

namespace Tests\Unit;

use App\Domain\Product;
use App\Infrastructure\SimpleProductRepository;
use PHPUnit\Framework\TestCase;

class SimpleRepositoryTest extends TestCase
{
	/** @test */
	public function test_it_filters_featured_items()
	{
		$repo = new SimpleProductRepository(
			[
				new Product("Apple", 8.99, true),
				new Product("Mango", 5, true),
				new Product("Lemon", 2, false),
			]
		);
		$results = $repo->getFeaturedProducts();
		$this->assertCount(2, $results);

		$this->assertInstanceOf(Product::class, $results->firstOrFail('name', 'Apple'));
		$this->assertInstanceOf(Product::class, $results->firstOrFail('name', 'Mango'));

	}

}
