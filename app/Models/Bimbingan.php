<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'dosen_id',
        'status',
        'nama_mahasiswa',
        'nim',
    ];

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now();
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }

    public function dosen()
    {
        return $this->belongsTo(Lecturer::class, 'dosen_id', 'id');
    }
}
