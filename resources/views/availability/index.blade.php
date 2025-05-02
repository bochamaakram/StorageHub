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

                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection