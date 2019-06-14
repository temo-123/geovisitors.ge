<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = \App\Service::all();
        $blogs = \App\Blog::all();
        $galleries = \App\Gallery::all();
        $artile_galleries = \App\Article_gallery::all();
        $tours = \App\Tour::all();
        $abouts = \App\About::all();

        $data = [
            'services' => $services,
            'tours' => $tours,
            'galleries' => $galleries,
            'artile_galleries' => $artile_galleries,
            'blogs' => $blogs,
            'abouts' => $abouts,

            'gallery_page_num_1' => 1,
            'gallery_page_num_2' => 1,

            
            'article_gallery_page_num_1' => 1,
            'article_gallery_page_num_2' => 1,            
        ];
        return view('admin.layouts.home', $data);
    }
}
