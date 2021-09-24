<?php

namespace Tests\Feature;

use App\Domain\IProductService;
use App\Http\ViewModels\ProductViewModel;
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
            ->assertSee('Chocolate ($20.00)')
            ->assertSee('Aqua ($4.99)');
    }
}
class StubService implements IProductService
{
    public function getFeaturedProducts(): Collection
    {
        return collect([
            new ProductViewModel('Chocolate', 20),
            new ProductViewModel('Aqua', 4.99),
        ]);
    }
}
