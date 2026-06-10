<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessRequest extends Model
{
    protected $table = 'business_requests';

    protected $fillable = [
        'user_id', 'nama_usaha', 'company_type', 'company_email', 'service_name', 'estimasi_harga', 'kota', 'id_kategori', 'deskripsi', 'kontak', 'alamat', 'notes', 'foto', 'initial_password', 'status', 'admin_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
