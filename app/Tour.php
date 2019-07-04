<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['title', 'text', 'description', 'image', 'published', 'category_id'];
}
