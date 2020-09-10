<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class ProductController extends Controller
{
     public function index()
    {
    	$products = Product::paginate(15);
    	return view('welcome', compact('products'));
    }

    public function products(Product $product)
    {
    	return view('products', compact('product'));
    }

    public function addToCart(Request $request)
	{
		request()->validate([
            'color' => 'required', 
            'size' => 'required',
        ]);

		//$price = $request->input('price') * $request->input('quantity');
	    $product = Product::find($request->input('id'));
	    $options = $request->except('_token', 'id', 'price', 'quantity');

	    Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('quantity'), $options);

	    return redirect('cart')->with('message', 'Item added to cart successfully.');
	}
}
