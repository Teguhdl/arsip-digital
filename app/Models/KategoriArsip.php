<?php
// app/Models/KategoriArsip.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArsip extends Model
{
    protected $table = 'kategori_arsip';

    protected $fillable = ['nama_kategori', 'kode_kategori', 'induk_id'];

    public function induk()
    {
        return $this->belongsTo(KategoriArsip::class, 'induk_id');
    }

    public function anak()
    {
        return $this->hasMany(KategoriArsip::class, 'induk_id');
    }
}
