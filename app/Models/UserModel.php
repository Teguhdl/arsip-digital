<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user_login';

    protected $primaryKey = 'id';

    public $timestamps = true; 

    protected $fillable = [
        'username',
        'nama_user',
        'password',
        'akses',
    ];

    protected $hidden = [
        'password',
    ];
}
