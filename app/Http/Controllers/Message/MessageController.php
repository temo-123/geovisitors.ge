<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Mail\Message;

class MessageController extends Controller
{
	public function send_form(Request $request)
	{
		$name = $request -> name;
		$surname = $request -> surname;
		$country = $request -> country;
		$email = $request -> email;
        $msg = $request ->  msg;
        
        Mail::to('samsonadze.temo9@gmail.com')->send(new Message($name, $surname, $country, $email, $msg));
        
        return back();
	}
        
}
