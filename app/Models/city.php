<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tickets;

class city extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
    ];
    public function ticket()
    {
        return $this->hasMany(Tickets::class);
    }
    public function hotels()
    {
        return $this->hasMany(Hotels::class);
    }
}
