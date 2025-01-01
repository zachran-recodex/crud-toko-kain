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

    public function show($id)
    {
        $sale = Sale::with('product')->findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $products = Product::all();
        return view('sales.edit', compact('sale', 'products'));
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Restore stock of the old product
        $sale->product->increment('stock_quantity', $sale->quantity);

        // Check stock for the updated product
        if ($product->stock_quantity < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi untuk produk ' . $product->name]);
        }

        $totalPrice = $product->price_per_meter * $request->quantity;

        $sale->update([
            'product_id' => $request->product_id,
            'customer_name' => $request->customer_name,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        $product->decrement('stock_quantity', $request->quantity);

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        // Restore stock
        $sale->product->increment('stock_quantity', $sale->quantity);

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
