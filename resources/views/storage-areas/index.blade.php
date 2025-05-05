@extends('layouts.app')

@section('content')
<style>
    /* Center the cards and reduce their width */
    .card-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 50px;
        gap: 80px; /* Added gap between the cards */
    }

    .card {
        width: 300px; /* Reduced width */
        margin-bottom: 20px; /* Space between cards */
    }

    /* Scroll-to-bottom button */
    .scroll-to-bottom {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #4f46e5;
        color: white;
        border: none;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
        font-size: 1.5rem;
        transition: background-color 0.3s ease;
    }

    .scroll-to-bottom:hover {
        background-color: #3b3a97;
    }
</style>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Storage Areas</h1>
        <a href="{{ route('storage-areas.create') }}" class="btn" style="background-color:rgba(79,70,229,255);color:white">Add New Storage Area</a>
    </div>

    <div class="card-container" >
        @foreach($storageAreas as $area)
        <div class="card shadow-lg" data-aos="fade-up" >
            <div class="card-header " style="background-color:rgba(79,70,229,255);color:white">
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
                    <a href="{{ route('storage-areas.edit', $area->id) }}" class="btn btn-sm btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $area->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal{{ $area->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Storage Area</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this storage area? This will also delete all products in this area.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('storage-areas.destroy', $area->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection

