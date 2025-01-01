<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product_id']);

        if ($product->stock_quantity < $validated['quantity']) {
            return redirect()->back()->with('error', 'Stok tidak cukup untuk produk ini.');
        }

        $totalPrice = $product->price_per_yard * $validated['quantity'];

        Sale::create([
            'product_id' => $validated['product_id'],
            'customer_name' => $validated['customer_name'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
        ]);

        $product->decrement('stock_quantity', $validated['quantity']);

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil disimpan');
    }

    public function edit(Sale $sale)
    {
        $products = Product::all();
        return view('sales.edit', compact('sale', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product_id']);

        if ($product->stock_quantity + $sale->quantity < $validated['quantity']) {
            return redirect()->back()->with('error', 'Stok tidak cukup untuk produk ini.');
        }

        $totalPrice = $product->price_per_yard * $validated['quantity'];

        if ($sale->quantity !== $validated['quantity']) {
            $product->increment('stock_quantity', $sale->quantity);

            $product->decrement('stock_quantity', $validated['quantity']);
        }

        $sale->update([
            'product_id' => $validated['product_id'],
            'customer_name' => $validated['customer_name'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diperbarui');
    }

    public function destroy(Sale $sale)
    {
        $product = $sale->product;

        $product->increment('stock_quantity', $sale->quantity);

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus');
    }
}
