@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
        color: #333;
        line-height: 1.6;
        background-color: #f4f6f9;
        padding: 30px 0;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        background-color: #fff;
    }

    .card-header {
        background-color: #4f46e5;
        color: white;
        font-weight: 600;
        font-size: 1.25rem;
        padding: 20px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        padding: 12px 15px;
        font-size: 1rem;
        border: 1px solid #ced4da;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
    }

    .btn-primary {
        background-color: #4f46e5;
        color: white;
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3730a3;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 20px;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check Product or Storage Area Availability</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('availability.check') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="search" class="form-label">Search for Product or Storage Area</label>
                            <input type="text" class="form-control" id="search" name="search" required placeholder="Enter product name or storage area name">
                        </div>
                        <button type="submit" class="btn btn-primary">🔍 Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
