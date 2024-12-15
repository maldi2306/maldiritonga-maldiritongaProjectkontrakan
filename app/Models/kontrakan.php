<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class kontrakan extends Model
{
    use HasFactory;
    use SearchableTrait;
    protected $fillable = [
        'no', 'no_kamar', 'status', 'keterangan', 'foto', 'harga', 'deskripsi',
    ];

    protected $searchable = [
        'columns' => [
            'users.first_name' => 10,
            'users.last_name' => 10,
            'users.bio' => 2,
            'users.email' => 5,
            'posts.title' => 2,
            'posts.body' => 1,
        ],
        'joins' => [
            'posts' => ['users.id','posts.user_id'],
        ],
    ];
}
