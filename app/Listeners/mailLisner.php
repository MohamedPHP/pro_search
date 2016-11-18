<?php

namespace App\Listeners;

use App\Events\mailForRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class mailLisner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  mailForRegister  $event
     * @return void
     */
    public function handle(mailForRegister $event)
    {
      $user = $event->user_name;
      $email = $event->user_email;
      $body = 'thanks very mush baby for register';
      $data = ['name' => $user];
      Mail::send('mail.mailStyle', $data, function($msg) use ($email, $user, $body) {
           $msg->from('moaalaa16@gmail.com', 'alaaDragneel');
           $msg->to($email, $user);
           $msg->subject($body);
      });
    }
}
