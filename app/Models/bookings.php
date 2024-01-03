<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'ticket_id', 'hotel_id', 'date'];
    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Tickets::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotels::class);
    }
}
