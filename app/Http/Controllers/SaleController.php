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
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($product->stock_quantity < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $total_price = $product->price_per_meter * $request->quantity;

        Sale::create([
            'product_id' => $request->product_id,
            'customer_name' => $request->customer_name,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        $product->decrement('stock_quantity', $request->quantity);

        return redirect()->route('sales.index')->with('success', 'Sale recorded successfully!');
    }
}
