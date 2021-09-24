<?php

namespace Tests\Unit;

use App\Domain\Product;
use App\Infrastructure\SqlProductRepository;
use App\Models\Product as SqlProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase as AppTestCase;

class SqlRepositoryTest extends AppTestCase
{
	use RefreshDatabase;

	/** @test */

	public function test_it_filters_featured_items()
	{
		SqlProduct::create(['name' => 'foo', 'unit_price' => 20, 'is_featured' => false]);

		SqlProduct::create(['name' => 'bar', 'unit_price' => 25, 'is_featured' => true]);
		SqlProduct::create(['name' => 'baz', 'unit_price' => 30,  'is_featured' => true]);

		$repo = new SqlProductRepository();
		$results = $repo->getFeaturedProducts();
		$this->assertCount(2, $results);

		$this->assertInstanceOf(Product::class, $results->firstOrFail('name', 'bar'));

		$this->assertInstanceOf(Product::class, $results->firstOrFail('name', 'baz'));
	}

	/** @test */
	public function test_sql_ergonomics()
	{
		$foo = SqlProduct::new(name: 'foo', unitPrice: 22, isFeatured: true);
		$this->assertEquals('foo', $foo->name);
	}
}
