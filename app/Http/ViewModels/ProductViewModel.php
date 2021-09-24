<?php

namespace App\Http\ViewModels;

class ProductViewModel
{
    public function __construct(private $name, private $unitPrice)
    {
    }

    public function summaryText()
    {
        return sprintf("%s ($%0.2f)", $this->name, $this->unitPrice);
    }
}