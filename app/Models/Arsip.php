<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $fillable = [
        'judul',
        'tanggal_arsip',
        'deskripsi',
        'file_path',
        'original_name',
        'mime_type',
        'ukuran',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_arsip' => 'date',
        ];
    }
}
