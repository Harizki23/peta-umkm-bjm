<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Umkm extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'umkm';

    protected $fillable = [
        'nama_umkm',
        'kategori',
        'kontak',
        'alamat',
        'latitude',
        'longitude',
        'foto_url',
        'deskripsi',
        'sumber_data'
    ];
}
