<?php

namespace Tests\Feature;

use App\Domain\DiscountedProduct;
use App\Domain\IProductService;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->app->bind(IProductService::class, StubService::class);
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSeeText('Chocolate ($20.00)')
            ->assertSeeText('Aqua ($4.99)');
    }
}
class StubService implements IProductService
{
    public function getFeaturedProducts(): Collection
    {
        return collect([
            new DiscountedProduct('Chocolate', 20),
            new DiscountedProduct('Aqua', 4.99),
        ]);
    }
}
