<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewController extends Controller
{
    /**
     * Display reviews for a specific hotel
     */
    public function index(Hotel $hotel): View
    {
        $reviews = $hotel->reviews()->with('user')->latest()->paginate(10);
        
        return view('reviews.index', [
            'hotel' => $hotel,
            'reviews' => $reviews,
        ]);
    }
    
    /**
     * Show the form for creating a new review
     */
    public function create(Hotel $hotel): View
    {
        return view('reviews.create', [
            'hotel' => $hotel,
        ]);
    }
    
    /**
     * Store a newly created review
     */
    public function store(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'review' => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        $review = new Review([
            'user_id' => Auth::id(),
            'hotel_id' => $hotel->id,
            'review' => $validated['review'],
            'rating' => $validated['rating'],
        ]);
        
        $review->save();
        
        return redirect()->route('hotels.reviews.index', $hotel)
            ->with('success', 'Thank you for your review!');
    }
    
    /**
     * Display all user's reviews
     */
    public function userReviews(): View
    {
        $reviews = Auth::user()->reviews()->with('hotel')->latest()->paginate(10);
        
        return view('reviews.user-reviews', [
            'reviews' => $reviews,
        ]);
    }
    
    /**
     * Delete a review
     */
    public function destroy(Hotel $hotel, Review $review)
    {
        // Authorization check
        if ($review->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }
        
        $review->delete();
        
        return back()->with('success', 'Review deleted successfully.');
    }
}