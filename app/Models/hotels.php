<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotels extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'city_id'];

    public function rates()
    {
        return $this->hasMany(Rates::class, 'hotel_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }
}
