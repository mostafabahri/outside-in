<?php

namespace Tests\Unit;

use App\Domain\Product;
use App\Infrastructure\SqlProductRepository;
use App\Models\Product as SqlProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase as AppTestCase;

class SqlRepositoryTest extends AppTestCase
{
	// use RefreshDatabase;
	/** @test */

	public function test_it_filters_featured_items()
	{
		SqlProduct::create(['name' => 'foo', 'unit_price' => 20, 'is_featured' => false]);

		SqlProduct::create(['name' => 'bar', 'unit_price' => 25, 'is_featured' => true]);
		SqlProduct::create(['name' => 'baz', 'unit_price' => 30,  'is_featured' => true]);

		$repo = new SqlProductRepository();
		$results = $repo->getFeaturedProducts();
		$this->assertCount(2, $results);

		$this->assertInstanceOf(Product::class, $bar = $results->firstOrFail('name', 'bar'));

		$this->assertEquals(25, $bar->unitPrice);
		$this->assertEquals(true, $bar->isFeatured);

		$this->assertInstanceOf(Product::class, $baz = $results->firstOrFail('name', 'baz'));
		$this->assertEquals(30, $baz->unitPrice);
		$this->assertEquals(true, $baz->isFeatured);
	}

	/** @test */
	public function test_sql_ergonomics()
	{
		$foo = SqlProduct::new(name: 'foo', unitPrice: 22, isFeatured: true);
		$this->assertEquals('foo', $foo->name);
	}
}
