<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    public function rooms() {
        return $this->hasMany(Room::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function bookings() {
        return $this->hasManyThrough(Booking::class, Room::class);
    }
<<<<<<< HEAD
    
public function averageRating()
{
    return $this->reviews()->avg('rating') ?: 0;
}

public function reviewsCount()
{
    return $this->reviews()->count();
}
=======
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
    public function scopeByRegion($query, $regionId)
   {
       return $query->where('region_id', $regionId);
   }
   
   // Filter scope by stars
   public function scopeByStars($query, $stars)
   {
       return $query->where('stars', $stars);
   }
   
>>>>>>> 9be42ed4ed2200b80f3882f88a1cc48054b1f24c
}
