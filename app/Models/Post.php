<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'imgCover',
        'title',
        'slug',
        'meta_description',
        'keywords',
        'content',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
