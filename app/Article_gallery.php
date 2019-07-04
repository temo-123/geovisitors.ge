<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_gallery extends Model
{
    protected $fillable = ['title', 'image', 'published', 'article'];
}
