<?php

namespace App\Models;

use App\Domain\Product as DomainProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFeatured($query)
    {
        return $query->whereIsFeatured(true);
    }

    public static function new($name, $unitPrice, $isFeatured)
    {
        return new self([
            'name' => $name,
            'unit_price' => $unitPrice,
            'is_featured' => $isFeatured,
        ]);
    }

    public function toDomain()
    {
        return new DomainProduct($this->name, $this->unitPrice, $this->isFeatured);
    }
}
