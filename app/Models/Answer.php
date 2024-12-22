<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'faq_id', 'user_id'];

    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
