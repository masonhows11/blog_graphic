<?php

namespace App\Listeners;

use App\Events\RegisterUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmailListener
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
     * @param  RegisterUserEvent  $event
     * @return void
     */
    public function handle(RegisterUserEvent $event)
    {

         Mail::to($event->user->email)->send(new EmailVerification($event->user));


    }
}
