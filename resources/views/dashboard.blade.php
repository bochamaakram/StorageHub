@extends('layouts.app')

@section('title', 'Dashboard - StorageHub')

@section('content')
<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        color: #333;
        line-height: 1.6;
        margin: 0;
        background-color: #f0f4f8;
    }

    /* Dashboard Specific Styles */
    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 40px;
        color: #4f46e5;
        text-align: center;
        animation: fadeInUp 1s ease-out;
    }

    /* Stats Cards */
    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
        animation: fadeInUp 1.5s ease-out;
    }

    .stat-card {
        padding: 30px;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
        border-left: 5px solid #4f46e5;
    }

    .stat-card:hover {
        transform: translateY(-10px);
    }

    .stat-card h3 {
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 15px;
        color: #64748b;
    }

    .stat-card .value {
        font-size: 2.5rem;
        font-weight: 600;
        color: #4f46e5;
        transition: color 0.3s ease;
    }

    .stat-card.low-stock .value {
        color: #ef4444;
    }

    /* Sections */
    .section {
        margin-bottom: 50px;
        animation: fadeInUp 2s ease-out;
    }

    .section-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        color: #4f46e5;
        position: relative;
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

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 18px 24px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    th {
        background-color: #f8fafc;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
    }

    tr:hover {
        background-color: #f8fafc;
        animation: rowHover 0.3s ease-out;
    }

    /* Badges */
    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .badge-warning {
        background-color: #fef3c7;
        color: #92400e;
    }

    /* Storage Area Cards */
    .storage-area-card {
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }

    .storage-area-card:hover {
        transform: translateY(-10px);
    }

    .storage-area-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .storage-area-name {
        font-weight: 600;
        color: #4f46e5;
    }

    .storage-area-count {
        background-color: #e0e7ff;
        color: #4f46e5;
        padding: 4px 12px;
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
    .bg-primary {
        background-color: #4f46e5;
    }

    /* Animations */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes rowHover {
        0% {
            background-color: #f8fafc;
        }
        100% {
            background-color: #e7f3ff;
        }
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
