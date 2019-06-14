<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Service;
use App\Blog;

class ServiceController extends Controller
{
	public function execute($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('site.service')) {
            $article = Service::where('title',strip_tags($name))->first();


            $services = Service::limit(3)->get();

            $data  = [
                'name'=>$article->name,
                'article'=>$article,

                'services' => $services,

                'service'=>1,
            ];
            return view('site.service',$data);
        }
        else{
            abort(404);
        }
    }
}
