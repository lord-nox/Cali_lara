<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['title', 'content', 'image', 'publication_date'];

    // Cast publication_date to a date instance
    protected $casts = [
        'publication_date' => 'date',
    ];
}
