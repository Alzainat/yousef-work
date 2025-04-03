<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class FeaturedHotelsController extends Controller
{
    //
    public function index()
    {
        // Get featured hotels
        // You can customize this query based on how you determine which hotels are "featured"
        // Example options:
        // 1. Hotels marked as featured in a database column
        // 2. Top-rated hotels
        // 3. Most booked hotels
        // 4. Manually selected hotel IDs

        // Option 1: If you have a "featured" column in your hotels table
        // $featuredHotels = Hotel::with('region')
        //     ->where('featured', true)
        //     ->take(6)
        //     ->get();

        // Option 2: If you want to feature top-rated hotels
        $featuredHotels = Hotel::with('region')
            ->orderBy('stars', 'desc')
            ->take(6)
            ->get();

        // Option 3: If you want to manually specify featured hotel IDs
        // $featuredIds = [1, 5, 8, 10, 15, 18]; // Replace with your featured hotel IDs
        // $featuredHotels = Hotel::with('region')
        //     ->whereIn('id', $featuredIds)
        //     ->get();
        
        return view('home', compact('featuredHotels'));
    }
}
