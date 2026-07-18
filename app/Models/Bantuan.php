<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    protected $fillable = [
        'kategori_masalah',
        'tingkat_sekolah',
        'email',
        'asal_ranting',
        'message',
    ];
}
