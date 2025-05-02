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
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: 500;
            }
            .btn-primary {
                background-color: #4f46e5;
                color: white;
            }
            .btn-danger {
                border: 1px solid #f70000;
                color: #f70000;
                background-color: #00000000;
            }
            .btn-warning {
                border: 1px solid #ffc107;
                color: #ffc107;
                background-color: #00000000;
            }
            .progress-bar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow: hidden;
    color: var(--bs-progress-bar-color);
    text-align: center;
    white-space: nowrap;
    background-color: #4f46e5;
    transition: var(--bs-progress-bar-transition);
}
            .hero {
                text-align: center;
                margin-bottom: 60px;
            }
            .hero h1 {
                font-size: 2.5rem;
                font-weight: 600;
                margin-bottom: 20px;
            }
            .hero p {
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto 30px;
            }
            .section {
                margin-bottom: 60px;
            }
            .section-title {
                font-size: 1.8rem;
                font-weight: 600;
                margin-bottom: 30px;
                text-align: center;
            }
            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
                margin-bottom: 60px;
            }
            .feature {
                padding: 25px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .feature h3 {
                font-size: 1.3rem;
                font-weight: 600;
                margin-bottom: 15px;
            }
            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 30px;
                text-align: center;
                margin-bottom: 60px;
            }
            .stat h4 {
                font-size: 2.5rem;
                font-weight: 600;
                color: #4f46e5;
                margin-bottom: 10px;
            }
            .cta {
                text-align: center;
                padding: 40px;
                background-color: #f8fafc;
                border-radius: 8px;
            }
            .cta h2 {
                font-size: 1.8rem;
                font-weight: 600;
                margin-bottom: 20px;
            }
            .bg-primar {
                background-color: #4f46e5 ;
            }
            hr {
                border: 0;
                height: 1px;
                background-color: #e2e8f0;
                margin: 40px 0;
            }
        </style>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Storage Areas</h1>
        <a href="{{ route('storage-areas.create') }}" class="btn btn-primary">Add New Storage Area</a>
    </div>

    <div class="row">
        @foreach($storageAreas as $area)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primar text-white">
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
                        <a href="{{ route('storage-areas.edit', $area->id) }}" class="btn btn-sm btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>
                        <form action="{{ route('storage-areas.destroy', $area->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure? This will also delete all products in this area.')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection