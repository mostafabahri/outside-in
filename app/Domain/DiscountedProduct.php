<?php

namespace App\Domain;

class DiscountedProduct
{
	public function __construct(public string $name, public $unitPrice)
	{
	}
}
