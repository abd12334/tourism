<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rates extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'hotel_id', 'comment', 'star'];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, 'hotel_id');
    }
}
