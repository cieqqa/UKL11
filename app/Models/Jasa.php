<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
        //use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jasa'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'nama_usaha',
    'alamat',
    'kota',
    'id_kategori',
    'deskripsi',
    'estimasi_harga',
    'kontak',
    'status_verif',
    'foto',
    'rating',
    'owner_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'jasa_id');
    }
}