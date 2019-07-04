<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Service;
use App\Tour;
use App\Article_gallery;

class PagesController extends Controller
{
	public function blog($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('site.page')) {
            $article = Blog::where('title',strip_tags($name))->first();

            $blogs = Blog::latest('id')->limit(8)->get();
            $services = Service::limit(3)->get();

            $data  = [
                'name'=>$article->name,
                'article'=>$article,
                'blogs' => $blogs,
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

            $services = Service::limit(6)->get();
            $article_galleries = Article_gallery::inRandomOrder()->where('published','=','1')->take(8)->where('article',strip_tags($name))->limit(8)->get();
            $tours = Tour::get();

            $data  = [
                'name'=>$article->name,
                'article'=>$article,

                'services' => $services,
                'tours' => $tours,
                'article_galleries' => $article_galleries,

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

            $article_galleries = Article_gallery::inRandomOrder()->where('published','=','1')->take(8)->where('article',strip_tags($name))->limit(8)->get();

            $data  = [
                'name'=>$article->name,
                'article'=>$article,

                // 'services' => $services,
                'article_galleries' => $article_galleries,

                'tour'=>1,
            ];
            return view('site.page',$data);
        }
        else{
            abort(404);
        }
    }
}
