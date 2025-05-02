<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StorageArea;
use Illuminate\Database\Seeder;

class StorageManagementSeeder extends Seeder
{
    public function run()
    {
        // Create storage areas
        $warehouse = StorageArea::create([
            'name' => 'Main Warehouse',
            'location' => 'Building A, Floor 1',
            'capacity' => 1000,
            'description' => 'Primary storage location for all products'
        ]);

        $coldStorage = StorageArea::create([
            'name' => 'Cold Storage',
            'location' => 'Building B, Floor -1',
            'capacity' => 500,
            'description' => 'Temperature-controlled storage for perishables'
        ]);

        // Create products
        Product::create([
            'name' => 'Premium Widget',
            'description' => 'High-quality widget for all your needs',
            'sku' => 'WIDGET-001',
            'price' => 19.99,
            'quantity' => 150,
            'storage_area_id' => $warehouse->id
        ]);

        Product::create([
            'name' => 'Deluxe Gadget',
            'description' => 'Feature-packed gadget with warranty',
            'sku' => 'GADGET-202',
            'price' => 49.99,
            'quantity' => 75,
            'storage_area_id' => $warehouse->id
        ]);

        Product::create([
            'name' => 'Organic Milk',
            'description' => 'Fresh organic milk, 1L carton',
            'sku' => 'DAIRY-101',
            'price' => 3.99,
            'quantity' => 200,
            'storage_area_id' => $coldStorage->id
        ]);
    }
}