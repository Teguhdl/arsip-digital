<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipDownloadHistory extends Model
{
    protected $table = 'arsip_download_histories';
    public $timestamps = false;

    protected $fillable = [
        'arsip_id',
        'user_id',
        'ip_address',
        'downloaded_at',
    ];

    public function arsip()
    {
        return $this->belongsTo(Arsip::class);
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
    public function downloadHistories()
    {
        return $this->hasMany(ArsipDownloadHistory::class, 'arsip_id');
    }
}
