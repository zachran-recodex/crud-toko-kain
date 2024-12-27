<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Kain Katun', 'stock_quantity' => 100, 'price_per_meter' => 5000],
            ['name' => 'Kain Wolfis', 'stock_quantity' => 200, 'price_per_meter' => 7500],
            ['name' => 'Kain Satin', 'stock_quantity' => 50, 'price_per_meter' => 1000],
            ['name' => 'Kain Organza', 'stock_quantity' => 300, 'price_per_meter' => 3000],
            ['name' => 'Kain Linen', 'stock_quantity' => 150, 'price_per_meter' => 6000],
        ];

        // Loop through the product array and create them
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
