<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikTugasAkhir extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kouta',
        'objek',
        'publisher',
    ];

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($topikTugasAkhir) {
            $topikTugasAkhir->created_at = now();
        });

        static::updating(function ($topikTugasAkhir) {
            $topikTugasAkhir->updated_at = now();
        });
    }
}
