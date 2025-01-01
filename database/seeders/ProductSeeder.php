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
            ['name' => 'Kain Katun', 'stock_quantity' => 100, 'price_per_yard' => 7000, 'type' => 'polos'],
            ['name' => 'Kain Wolfis', 'stock_quantity' => 200, 'price_per_yard' => 8500, 'type' => 'polos'],
            ['name' => 'Kain Satin', 'stock_quantity' => 50, 'price_per_yard' => 12000, 'type' => 'motif'],
            ['name' => 'Kain Organza', 'stock_quantity' => 300, 'price_per_yard' => 15000, 'type' => 'motif'],
            ['name' => 'Kain Linen', 'stock_quantity' => 150, 'price_per_yard' => 10000, 'type' => 'polos'],
        ];

        // Loop through the product array and create them
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
