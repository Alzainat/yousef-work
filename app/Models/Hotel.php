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
    
public function averageRating()
{
    return $this->reviews()->avg('rating') ?: 0;
}

public function reviewsCount()
{
    return $this->reviews()->count();
}
}
