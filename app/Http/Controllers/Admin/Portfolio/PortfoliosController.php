<?php

namespace App\Http\Controllers\Admin\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class PortfoliosController extends Controller
{
	public function execute(){
    	if (view()->exists('admin.portfolios')) {
    		$portfolios = \App\Blog::all();

    		$data = [
    			'title'=>'portfolios',
    			'portfolios'=>$portfolios
    		];
    		return view('admin.portfolios',$data);
    	}
    	abort(404);
    }
}
