<?php

use Illuminate\Database\Seeder;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//Product::factory(50)->create();
        $this->call(ProductsTableSeeder::class);
    	$this->call(ProductSizesTableSeeder::class);
        $this->call(AvailableProductsTableSeeder::class);
    	
    }
}
