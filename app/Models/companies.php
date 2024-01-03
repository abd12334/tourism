<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tickets;

class companies extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',

    ];
    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}
