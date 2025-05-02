@extends('layouts.app')

@section('content')
<div class="container">
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