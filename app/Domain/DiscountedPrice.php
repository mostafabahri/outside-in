<?php

namespace App\Domain;

class DiscountedPrice
{
	public function __construct(public string $name, public $unitPrice)
	{
	}
}
