<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'lokasi',
        'harga_weekday',
        'harga_weekend',
        'nego_weekday',
        'nego_weekend',
        'kapasitas',
        'kamar_tidur',
        'kamar_mandi',
        'foto_slider',
        'fasilitas',
        'map_embed',
        'nomor_wa',
    ];


    protected $casts = [
        'nego_weekday' => 'boolean',
        'nego_weekend' => 'boolean',
        'foto_slider' => 'array',
        'fasilitas' => 'array',
    ];
}