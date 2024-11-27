<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'name',
    ];

    // Relasi dengan tabel movies
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
