<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StorageArea;

class DashboardController extends Controller
{
    public function index()
{
    return view('dashboard', [
        'totalProducts' => Product::count(),
        'lowStockItems' => Product::where('quantity', '<', 5)->count(),
        'storageAreas' => StorageArea::withCount('products')->get(),
        'recentProducts' => Product::with('storageArea')
            ->latest()
            ->limit(5)
            ->get(),
        'storageLocations' => StorageArea::count()
    ]);
}
}