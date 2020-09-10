<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
	$name = $faker->unique()->company;
    $slug = Str::slug($name, '-');

    return [
        'name' => $name,
        'slug' => $slug,
        'price' => $faker->randomNumber(3),
        'description' => $faker->paragraph,
        'image' => $faker->image('public/images',400, 300, null, false),
    ];
});
