<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_title',
        'quote',
        'type',
        'year'
    ];
}
