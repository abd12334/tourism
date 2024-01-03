<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\city;
use App\Models\companies;


class tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'city_id',
        'date_s',
        'date_e',
    ];
    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function booking()
    {
        return $this->hasMany(Bookings::class);
    }
}
