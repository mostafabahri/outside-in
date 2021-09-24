<?php

namespace App\Domain;

class Product
{
	public function __construct(public $name, public $unitPrice) {
	}

	public function applyDiscountFor(): DiscountedProduct
	{
		return new DiscountedProduct($this->name, $this->unitPrice);
	}
}
