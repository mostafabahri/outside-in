<?php

namespace App\Domain;

class Product
{
	public function __construct(public $name, public $unitPrice) {
	}

	public function applyDiscountFor(IUserContext $user): DiscountedProduct
	{
		$isPreferred = $user->isInRole(Role::PreferredCustomer);

		$discount = $isPreferred ? 0.95 : 1;

		return new DiscountedProduct($this->name, $this->unitPrice * $discount);
	}
}
