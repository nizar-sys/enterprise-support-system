<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanTA extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'khs',
        'eprt',
    ];

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kelengkapanTA) {
            $kelengkapanTA->created_at = now();
        });

        static::updating(function ($kelengkapanTA) {
            $kelengkapanTA->updated_at = now();
        });
    }
}
