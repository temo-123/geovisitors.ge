<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Message extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $surname, $country, $email, $msg)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->country = $country;
        $this->email = $email;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');


                // return $this->view('view.name');
        
        $subject = 'Message from geovisitors.ge';
        
        return $this->view('email.message')->with([

            'name'=>$this->name,
            'surname'=>$this->surname,
            'country'=>$this->country,
            'email'=>$this->email,
            'msg'=>$this->msg,
        ])->subject($subject);
    }
}
