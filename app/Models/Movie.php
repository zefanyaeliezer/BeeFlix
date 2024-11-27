<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'genre_id',
        'title',
        'photo',
        'publish_date',
        'description',
    ];

    // Relasi dengan tabel genres
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
