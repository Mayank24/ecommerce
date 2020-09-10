<?php

use Illuminate\Database\Seeder;
use App\ProductSize;

class ProductSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSize::create([
        	'size_name' => 'S',
        	'body_length' => 2.5,
        	'body_width' => 3.7,
        ]);

        ProductSize::create([
        	'size_name' => 'M',
        	'body_length' => 2.9,
        	'body_width' => 4.2,
        ]);

        ProductSize::create([
        	'size_name' => 'L',
        	'body_length' => 3.3,
        	'body_width' => 4.7,
        ]);
    }
}
