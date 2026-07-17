<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'bidang_id',
    ];

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
