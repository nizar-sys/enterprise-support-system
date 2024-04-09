<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalTat extends Model
{
    use HasFactory;

    protected $fillable = [
        'tat_id',
        'tahun_lulus',
        'email',
        'telepon',
    ];

    // function boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->created_at = now();
        });

        static::updating(function ($query) {
            $query->updated_at = now();
        });
    }

    // function relation

    public function tat()
    {
        return $this->belongsTo(TAT::class, 'tat_id', 'id');
    }
}
