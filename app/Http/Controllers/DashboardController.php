<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalSales = Sale::sum('quantity');
        $totalRevenue = Sale::sum('total_price');
        $totalSuppliers = Supplier::count();

        return view('dashboard', compact('totalProducts', 'totalSales', 'totalSuppliers', 'totalRevenue'));
    }
}
