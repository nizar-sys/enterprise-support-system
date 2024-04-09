<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAT extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'surat_keterangan_lulus',
        'tugas_akhir',
    ];

    // function boot
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_at = now();
        });

        self::updating(function ($model) {
            $model->updated_at = now();
        });
    }
}
