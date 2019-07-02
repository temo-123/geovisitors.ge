<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Service;
use App\Blog;

class PortfolioController extends Controller
{
	public function execute($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('site.service')) {
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

                'portfolio'=>1,
            ];
            return view('site.service',$data);
        }
        else{
            abort(404);
        }
    }
}
