<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class laporan extends Model
{
    
    protected $fillable = [
        'tanggal_pelaporan',
        'nama_pelapor',
        'no_kamar',
        'status',
        'deskripsi',
    ];

    protected $dates = [
        'tanggal_pelaporan',
        'created_at',
        'updated_at',
    ];
    public function User(): BelongsTo{
        return $this->belongsTo(User::class, 'nama_pelapor')->withDefault();
    }
}