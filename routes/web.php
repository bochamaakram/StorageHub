<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorageAreaController;
use App\Http\Controllers\AvailabilityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Product routes
Route::resource('products', ProductController::class);

// Storage Area routes
Route::resource('storage-areas', StorageAreaController::class);

// Availability routes
Route::get('/availability', [AvailabilityController::class, 'index'])->name('availability.index');
Route::post('/availability/check', [AvailabilityController::class, 'check'])->name('availability.check');

use App\Http\Controllers\ProfileController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::middleware('auth')->group(function () {
    // Product routes
    Route::resource('products', ProductController::class);
    
    // Storage Area routes
    Route::resource('storage-areas', StorageAreaController::class);
    
    // Availability routes
    Route::get('/availability', [AvailabilityController::class, 'index'])->name('availability.index');
    Route::post('/availability/check', [AvailabilityController::class, 'check'])->name('availability.check');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
