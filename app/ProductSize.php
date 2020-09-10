<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\AvailableProductSize;

class ProductSize extends Model
{
    public function products()
	{
	    return $this->belongsToMany(Product::class, AvailableProductSize::class, 'product_size_id', 'product_id');
	}
}
