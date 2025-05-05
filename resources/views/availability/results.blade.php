@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        color: #333;
        line-height: 1.6;
        max-width: 1200px;
        margin: 0 auto;
        background-color: #f9f9fb;
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 30px;
        color: #4f46e5;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .card-header {
        background-color: #4f46e5;
        color: white;
        font-weight: 600;
        font-size: 1.2rem;
        padding: 15px 20px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 20px;
        background-color: #ffffff;
    }

    .table thead {
        background-color: #f0f0f0;
    }

    .table th {
        color: #4f46e5;
        font-weight: 600;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .alert-info {
        background-color: #e0f0ff;
        border: 1px solid #b6e0fe;
        color: #3178c6;
        padding: 15px;
        border-radius: 8px;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        color: white;
    }
</style>

<div class="container-fluid">
    <h1 class="mb-4">Search Results for "{{ $search }}"</h1>

    @if($products->isEmpty() && $storageAreas->isEmpty())
        <div class="alert alert-info">
            No results found for your search.
        </div>
    @else
        @if(!$products->isEmpty())
            <div class="card mb-4">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Quantity</th>
                                    <th>Storage Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->storageArea->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if(!$storageAreas->isEmpty())
            <div class="card">
                <div class="card-header">Storage Areas</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Capacity</th>
                                    <th>Available Space</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($storageAreas as $area)
                                <tr>
                                    <td>{{ $area->name }}</td>
                                    <td>{{ $area->location }}</td>
                                    <td>{{ $area->capacity }}</td>
                                    <td>{{ $area->available_space }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div class="mt-4">
        <a href="{{ route('availability.index') }}" class="btn btn-secondary">New Search</a>
    </div>
</div>
@endsection
