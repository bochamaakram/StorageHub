@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Storage Areas</h1>
        <a href="{{ route('storage-areas.create') }}" class="btn btn-primary">Add New Storage Area</a>
    </div>

    <div class="row">
        @foreach($storageAreas as $area)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">{{ $area->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <strong>Location:</strong> {{ $area->location }}
                    </div>
                    <div class="mb-2">
                        <strong>Capacity:</strong> {{ $area->capacity }}
                    </div>
                    <div class="mb-3">
                        <strong>Available Space:</strong> {{ $area->available_space }}
                    </div>
                    
                    <div class="progress mb-3">
                        @php
                            $usedPercentage = $area->capacity ? 100 - (($area->available_space / $area->capacity) * 100) : 0;
                        @endphp
                        <div class="progress-bar" role="progressbar" style="width: {{ $usedPercentage }}%" 
                             aria-valuenow="{{ $usedPercentage }}" aria-valuemin="0" aria-valuemax="100">
                            {{ round($usedPercentage) }}% used
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('storage-areas.edit', $area->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('storage-areas.destroy', $area->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure? This will also delete all products in this area.')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection