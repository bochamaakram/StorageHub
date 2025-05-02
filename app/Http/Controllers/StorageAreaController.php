<?php

namespace App\Http\Controllers;

use App\Models\StorageArea;
use Illuminate\Http\Request;

class StorageAreaController extends Controller
{
    public function index()
    {
        $storageAreas = StorageArea::with('products')->get();
        return view('storage-areas.index', compact('storageAreas'));
    }

    public function create()
    {
        return view('storage-areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string'
        ]);

        StorageArea::create($validated);

        return redirect()->route('storage-areas.index')->with('success', 'Storage area created successfully.');
    }

    public function edit(StorageArea $storageArea)
    {
        return view('storage-areas.edit', compact('storageArea'));
    }

    public function update(Request $request, StorageArea $storageArea)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string'
        ]);

        $storageArea->update($validated);

        return redirect()->route('storage-areas.index')->with('success', 'Storage area updated successfully.');
    }
    public function destroy(StorageArea $storageArea)
    {
        $storageArea->delete();
        return redirect()->route('storage-areas.index')->with('success', 'Storage area deleted successfully.');
    }
}