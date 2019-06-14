<?php

namespace App\Http\Controllers\Admin\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class ServicesController extends Controller
{
    public function execute(){
    	if (view()->exists('admin.services')) {
    		$services = \App\Service::all();

    		$data = [
    			'title'=>'services',
    			'services'=>$services
    		];
    		return view('admin.services',$data);
    	}
    	abort(404);
    }
}
