@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check Product or Storage Area Availability</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('availability.check') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="search" class="form-label">Search for Product or Storage Area</label>
                            <input type="text" class="form-control" id="search" name="search" required placeholder="Enter product name, SKU, or storage area name">
                        </div>

                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection