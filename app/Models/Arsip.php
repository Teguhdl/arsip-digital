<?php 

// app/Models/Arsip.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';

    protected $fillable = [
        'kode_arsip',
        'nama_arsip',
        'kategori_arsip_id',
        'deskripsi',
        'file',
        'user_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriArsip::class, 'kategori_arsip_id');
    }
}


?>