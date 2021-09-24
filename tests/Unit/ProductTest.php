<?php

namespace Tests\Unit;

use App\Domain\IUserContext;
use App\Domain\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_applies_discount()
    {
        $product = new Product('phone', 100);

        $context = new StubContext(allow: true);
        $discounted = $product->applyDiscountFor($context);

        $this->assertEquals($discounted->unitPrice, 95);
    }

    public function test_applies_discount_not()
    {
        $product = new Product('phone', 100);

        $context = new StubContext(allow: false);
        $discounted = $product->applyDiscountFor($context);

        $this->assertEquals($discounted->unitPrice, 100);
    }
}

class StubContext implements IUserContext {

    public function __construct(private bool $allow) {
    }
	public function isInRole($role): bool {
        return $this->allow;
    }
}
