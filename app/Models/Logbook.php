<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'bimbingan_id',
        'progres',
        'status',
        'feedback',
    ];

    public function bimbingan()
    {
        return $this->belongsTo(Bimbingan::class, 'bimbingan_id', 'id');
    }

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($logbook) {
            $logbook->created_at = now();
        });

        static::updating(function ($logbook) {
            $logbook->updated_at = now();
        });
    }
}
