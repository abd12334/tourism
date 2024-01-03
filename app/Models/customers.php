<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender'
    ];
    public function Bookings():object{
        return $this->hasMany(Bookings::class);
    }
    public function Rates():object{
        return $this->hasMany(Rates::class);
    }
}
