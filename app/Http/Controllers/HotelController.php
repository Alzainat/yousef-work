<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Region;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    // Display all hotels with filters
    public function index(Request $request)
    {
        $regions = Region::all();
        $query = Hotel::query()->with('region');
        
        // Filter by price
        if ($request->has('price_range')) {
            $priceRange = explode('-', $request->price_range);
            $minPrice = $priceRange[0];
            $maxPrice = $priceRange[1];
            $query->byPriceRange($minPrice, $maxPrice);
        }
    // Filter by region
    if ($request->has('region_id') && $request->region_id != '') {
        $query->byRegion($request->region_id);
    }
    
    // Filter by stars
    if ($request->has('stars') && $request->stars != '') {
        $query->byStars($request->stars);
    }
    
    $hotels = $query->paginate(12);
    
    return view('hotels.index', compact('hotels', 'regions'));
}
 // Display single hotel details
 public function show($id)
 {
     $hotel = Hotel::with(['region'])->findOrFail($id);
     
     // Get similar hotels (same region or stars)
     $similarHotels = Hotel::where('id', '!=', $hotel->id)
         ->where(function($query) use ($hotel) {
             $query->where('region_id', $hotel->region_id)
                   ->orWhere('stars', $hotel->stars);
         })
         ->limit(4)
         ->get();
         
     return view('hotels.show', compact('hotel', 'similarHotels'));
 }
}

?>