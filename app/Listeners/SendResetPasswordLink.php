<?php

namespace App\Listeners;

use App\Events\ResetPasswordEvent;
use App\Mail\EmailResetPassLink;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendResetPasswordLink
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
     * @param  ResetPasswordEvent  $event
     * @return void
     */
    public function handle(ResetPasswordEvent $event)
    {
        //dd($event->user_info);
        //
        Mail::to($event->user_info->email)->send(new EmailResetPassLink($event->user_info));
    }
}
