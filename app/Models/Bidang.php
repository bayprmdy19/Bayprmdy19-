<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bidang extends Model
{
    protected $table = 'bidang';

    protected $fillable = [
        'nama',
        'tipe',
        'deskripsi',
    ];

    public function anggotas(): HasMany
    {
        return $this->hasMany(Anggota::class, 'bidang_id');
    }
}
