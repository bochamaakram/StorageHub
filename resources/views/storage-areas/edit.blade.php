@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        color: #333;
        line-height: 1.6;
        max-width: 1200px;
        margin: 0 auto;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .nav-links a {
        margin-left: 20px;
        text-decoration: none;
        color: #333;
        font-weight: 500;
    }

    .nav-links a:hover {
        color: #4f46e5;
    }

    .btn {
        display: inline-block;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary {
        background-color: #4f46e5;
        color: white;
    }

    .btn-primary:hover {
        background-color: #4338ca;
        transform: scale(1.05);
    }

    .btn-secondary {
        background-color: transparent;
        color: #4f46e5;
        border: 1px solid #4f46e5;
    }

    .btn-secondary:hover {
        background-color: #4f46e5;
        color: white;
        transform: scale(1.05);
    }

    .btn-secondary:focus,
    .btn-primary:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background-color: #4f46e5;
        color: white;
        font-size: 1.5rem;
        font-weight: 600;
        padding: 20px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        padding: 12px;
        font-size: 1rem;
        margin-bottom: 15px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
    }

    .form-select {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        padding: 12px;
        font-size: 1rem;
        margin-bottom: 15px;
        transition: border-color 0.3s ease;
    }

    .form-select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
    }

    .form-container {
        animation: fadeInUp 1s ease-out;
    }

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
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card form-container">
                <div class="card-header">Edit Storage Area</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storage-areas.update', $storageArea->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Area Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $storageArea->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $storageArea->location }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $storageArea->capacity }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $storageArea->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Storage Area</button>
                        <a href="{{ route('storage-areas.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
