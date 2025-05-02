@extends('layouts.app')

@section('title', 'Dashboard - StorageHub')

@section('content')
<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        color: #333;
        line-height: 1.6;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    /* Dashboard Specific Styles */
    .dashboard-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 30px;
    }
    
    /* Stats Cards */
    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }
    
    .stat-card {
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    .stat-card h3 {
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 10px;
        color: #64748b;
    }
    
    .stat-card .value {
        font-size: 2.2rem;
        font-weight: 600;
        color: #4f46e5;
    }
    
    .stat-card.low-stock .value {
        color: #ef4444;
    }
    
    /* Sections */
    .section {
        margin-bottom: 50px;
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    
    .section-title:before {
        content: "";
        display: inline-block;
        width: 8px;
        height: 24px;
        background-color: #4f46e5;
        margin-right: 12px;
        border-radius: 4px;
    }
    
    /* Tables */
    .table-container {
        overflow-x: auto;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: white;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th, td {
        padding: 16px 24px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }
    
    th {
        background-color: #f8fafc;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }
    
    tr:hover {
        background-color: #f8fafc;
    }
    
    /* Badges */
    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .badge-warning {
        background-color: #fef3c7;
        color: #92400e;
    }
    
    /* Storage Area Cards */
    .storage-area-card {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    
    .storage-area-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }
    
    .storage-area-name {
        font-weight: 600;
        color: #4f46e5;
    }
    
    .storage-area-count {
        background-color: #e0e7ff;
        color: #4f46e5;
        padding: 2px 10px;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    
    /* Grid Layout */
    .grid-cols-2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    @media (max-width: 768px) {
        .grid-cols-2 {
            grid-template-columns: 1fr;
        }
    }
    
    /* Utility Classes */
    .bg-primar {
        background-color: #4f46e5;
    }
</style>

<div class="container-fluid">
    <h1 class="dashboard-title">Dashboard Overview</h1>

    <!-- Stats Cards -->
    <div class="stats">
        <div class="stat-card">
            <h3>Total Products</h3>
            <div class="value">{{ $totalProducts }}</div>
        </div>
        
        <div class="stat-card low-stock">
            <h3>Low Stock Items</h3>
            <div class="value">{{ $lowStockItems }}</div>
        </div>
        
        <div class="stat-card">
            <h3>Storage Locations</h3>
            <div class="value">{{ $storageLocations }}</div>
        </div>
    </div>

    <div class="grid-cols-2">
        <!-- Recent Products Section -->
        <div class="section">
            <h2 class="section-title">Recent Products</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentProducts as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if($product->quantity < 5)
                                    <span class="badge badge-warning">{{ $product->quantity }}</span>
                                @else
                                    {{ $product->quantity }}
                                @endif
                            </td>
                            <td>{{ $product->storageArea->name ?? 'N/A' }}</td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Storage Areas Section -->
        <div class="section">
            <h2 class="section-title">Storage Areas</h2>
            @foreach($storageAreas as $area)
            <div class="storage-area-card">
                <div class="storage-area-header">
                    <span class="storage-area-name">{{ $area->name }}</span>
                    <span class="storage-area-count">{{ $area->products_count }} items</span>
                </div>
                <p>{{ $area->description ?? 'No description available' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection