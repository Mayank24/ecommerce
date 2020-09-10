<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductSize;
use App\AvailableProductSize;

class Product extends Model
{
    public function sizes()
	{
	    return $this->belongsToMany(ProductSize::class, AvailableProductSize::class, 'product_id', 'product_size_id');
	}

	public function addToCart(Request $request)
	{
	    $product = $this->productRepository->findProductById($request->input('productId'));
	    $options = $request->except('_token', 'productId', 'price', 'qty');

	    Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

	    return redirect()->back()->with('message', 'Item added to cart successfully.');
	}
}
