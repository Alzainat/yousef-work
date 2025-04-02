<?php

use App\Http\Controllers\ProfileController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Home Page
Route::get('/home', [PageController::class, 'home'])->name('home');

// Hotels Page
Route::get('/hotels', [PageController::class, 'hotels'])->name('hotels');

// Contact Us Page
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Hotel reviews routes
Route::middleware(['auth'])->group(function () {
    // View all reviews for a hotel
    Route::get('/hotels/{hotel}/reviews', [ReviewController::class, 'index'])
        ->name('hotels.reviews.index');
    
    // Create a new review form
    Route::get('/hotels/{hotel}/reviews/create', [ReviewController::class, 'create'])
        ->name('hotels.reviews.create');
    
    // Store a new review
    Route::post('/hotels/{hotel}/reviews', [ReviewController::class, 'store'])
        ->name('hotels.reviews.store');
    
    // Delete a review
    Route::delete('/hotels/{hotel}/reviews/{review}', [ReviewController::class, 'destroy'])
        ->name('hotels.reviews.destroy');
    
    // View all reviews by the current user
    Route::get('/my-reviews', [ReviewController::class, 'userReviews'])
        ->name('user.reviews');
});




require __DIR__.'/auth.php';
