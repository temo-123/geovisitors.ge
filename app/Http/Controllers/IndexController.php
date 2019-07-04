<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\About;
use App\Service;
use App\Blog;
use App\Gallery;
use App\Tour;

use DB;

class IndexController extends Controller
{
	public function execute(Request $request) {
    	$abouts = About::take(1)->get();
    	$blogs = Blog::where('published','=','1')->latest('id')->limit(4)->get();
    	$services = Service::where('published','=','1')->get();
    	$galleries = Gallery::inRandomOrder()->where('published','=','1')->take(8)->get();
        $tours = Tour::where('published','=','1')->get();

        $data = [
            'services' => $services,
            'blogs' => $blogs,
            'galleries' => $galleries,
            'abouts' => $abouts,
            'tours' => $tours,

            'index' => 1,
            'thurs_num' => 0
        ];
        return view('site.index', $data);
    }
}
