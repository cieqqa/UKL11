<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    public function jasa()
    {
        return $this->hasMany(Jasa::class, 'id_kategori');
    }
}
