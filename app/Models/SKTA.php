<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKTA extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'surat',
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
}
