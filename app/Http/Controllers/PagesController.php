<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Service;
use App\Tour;

class PagesController extends Controller
{
	public function blog($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('site.page')) {
            $article = Blog::where('title',strip_tags($name))->first();

            $portfolios = Blog::limit(8)->get();
            $portfolio_count = Blog::count();
            $services = Service::limit(3)->get();

            $data  = [
                'name'=>$article->name,
                'article'=>$article,
                'portfolio_count'=>$portfolio_count,
                'portfolios' => $portfolios,
                'services' => $services,

                'blog' => 1,
            ];
            return view('site.page',$data);
        }
        else{
            abort(404);
        }
    }


    public function service($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('site.page')) {
            $article = Service::where('title',strip_tags($name))->first();


            $services = Service::limit(3)->get();

            $data  = [
                'name'=>$article->name,
                'article'=>$article,

                'services' => $services,

                'service'=>1,
            ];
            return view('site.page',$data);
        }
        else{
            abort(404);
        }
    }


    public function tour($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('site.page')) {
            $article = Tour::where('title',strip_tags($name))->first();


            $services = Tour::limit(3)->get();

            $data  = [
                'name'=>$article->name,
                'article'=>$article,

                'services' => $services,

                'tour'=>1,
            ];
            return view('site.page',$data);
        }
        else{
            abort(404);
        }
    }
}
