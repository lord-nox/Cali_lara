<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'image', 'publication_date'];

    protected $casts = [
        'publication_date' => 'date',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
