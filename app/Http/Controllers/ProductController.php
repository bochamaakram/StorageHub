<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StorageArea;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('storageArea')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $storageAreas = StorageArea::all();
        return view('products.create', compact('storageAreas'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'storage_area_id' => 'required|exists:storage_areas,id'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $storageAreas = StorageArea::all();
        return view('products.edit', compact('product', 'storageAreas'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'storage_area_id' => 'required|exists:storage_areas,id'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}