<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontrakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no', 'no_kamar', 'status', 'keterangan', 'foto', 'harga', 'deskripsi',
    ];
}
