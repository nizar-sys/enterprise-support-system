<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_dosen',
        'nama',
        'nip',
        'email',
        'telepon',
    ];

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lecturer) {
            $lecturer->created_at = now();
        });

        static::updating(function ($lecturer) {
            $lecturer->updated_at = now();
        });
    }
}
