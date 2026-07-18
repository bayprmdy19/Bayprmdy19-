<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Anggota extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'jabatan',
        'username',
        'email',
        'alamat',
        'no_telp',
        'bidang_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public const JABATAN_UMUM = [
        'ketua_umum',
        'sekretaris_umum',
        'bendahara_umum',
    ];

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
