<?php
use Illuminate\Database\Seeder;
use App\Product;
use App\ProductSize;
use App\AvailableProductSize;

class AvailableProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::get();
        $ProductSize = ProductSize::get();

        foreach ($products as $key => $value) {
        	foreach ($ProductSize as $k => $v) {
        		AvailableProductSize::create([
        			'product_id' => $value->id,
        			'product_size_id' => $v->id,
        			'quantity' => 50,
        		]);
        	}
        }
    }
}
