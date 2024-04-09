<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal',
    ];

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jadwal) {
            $jadwal->created_at = now();
        });

        static::updating(function ($jadwal) {
            $jadwal->updated_at = now();
        });
    }
}
