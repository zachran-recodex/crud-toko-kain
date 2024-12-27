<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'products' => 'required|array',
            'quantities' => 'required|array',
        ]);

        foreach ($request->products as $productId) {
            $quantity = $request->quantities[$productId];
            $product = Product::findOrFail($productId);

            if ($product->stock_quantity < $quantity) {
                return back()->withErrors(['quantities' => 'Stok tidak mencukupi untuk produk ' . $product->name]);
            }

            $totalPrice = $product->price_per_meter * $quantity;

            Sale::create([
                'product_id' => $productId,
                'customer_name' => $request->customer_name,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
            ]);

            $product->decrement('stock_quantity', $quantity);
        }

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }
}
