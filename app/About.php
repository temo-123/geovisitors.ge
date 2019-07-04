<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title', 'text', 'site_url', 'description', 'image', 'header_image', 'site_image', 'published', 'about_service', 'about_thure', 'about_gallery', 'about_blog', 'fb', 'inst', 'twit', 'email'];
}
