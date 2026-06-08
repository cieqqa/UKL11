<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'jasa_id',
        'full_name',
        'email',
        'phone',
        'city',
        'address',
        'service_name',
        'date',
        'time',
        'notes',
        'payment_method',
        'price',
        'status',
    ];

    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'jasa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendor()
    {
        return $this->jasa->owner();
    }
}
