<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Message;
use App\About;

class MessageController extends Controller
{
	public function send_form(Request $request)
	{
		$name = $request -> name;
		$surname = $request -> surname;
		$country = $request -> country;
		$email = $request -> email;
        $msg = $request ->  msg;

        $abouts = About::get(['email']);
        
        foreach ($abouts as $about) {
        	$my_mail = $about->email;
        }

        Mail::to($my_mail)->send(new Message($name, $surname, $country, $email, $msg));
        // Mail::to('samsonadze.temo9@gmail.com')->send(new Message($name, $surname, $country, $email, $msg));
        
        return back();
	}
        
}
