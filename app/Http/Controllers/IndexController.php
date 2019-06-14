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
    	$blogs = Blog::latest('id')->limit(8)->get();
    	$services = Service::where('id','<',20)->get();
    	$galleries = Gallery::take(6)->get();
        $tours = Tour::get();

        $data = [
            'services' => $services,
            'blogs' => $blogs,
            'galleries' => $galleries,
            'abouts' => $abouts,
            'tours' => $tours,

            'index' => 1,
            'thurs_num' => 1
        ];
        return view('site.index', $data);
    }
}
