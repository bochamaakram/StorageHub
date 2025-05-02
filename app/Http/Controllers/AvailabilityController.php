<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StorageArea;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function index()
    {
        return view('availability.index');
    }
    
    public function check(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);

        $search = $request->input('search');

        $products = Product::where('name', 'like', "%$search%")->get();

        $storageAreas = StorageArea::where('name', 'like', "%$search%")
            ->orWhere('location', 'like', "%$search%")
            ->get();

        return view('availability.results', compact('products', 'storageAreas', 'search'));
    }
}