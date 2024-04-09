<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasakhir extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'topik_id',
        'bimbingan_id',
        'kelengkapan_id',
        'skta_id',
        'tat_id',
    ];

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tugasakhir) {
            $tugasakhir->created_at = now();
        });

        static::updating(function ($tugasakhir) {
            $tugasakhir->updated_at = now();
        });
    }

    // relation to dosen
    public function dosen()
    {
        return $this->belongsTo(Lecturer::class, 'dosen_id');
    }

    // relation to topik
    public function topik()
    {
        return $this->belongsTo(TopikTugasAkhir::class, 'topik_id');
    }

    // relation to bimbingan
    public function bimbingan()
    {
        return $this->belongsTo(Bimbingan::class, 'bimbingan_id');
    }

    // relation to kelengkapan
    public function kelengkapan()
    {
        return $this->belongsTo(KelengkapanTA::class, 'kelengkapan_id');
    }

    // relation to skta
    public function skta()
    {
        return $this->belongsTo(SKTA::class, 'skta_id');
    }

    // relation to tat
    public function tat()
    {
        return $this->belongsTo(TAT::class, 'tat_id');
    }
}
