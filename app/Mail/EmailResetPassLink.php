<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailResetPassLink extends Mailable
{
    use Queueable, SerializesModels;
    protected $user_info;

    /**
     * Create a new message instance.
     *
     * @param  $user
     */
    public function __construct($user)
    {
        //
        $this->user_info = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('auth.email_reset_password.email_reset_pass')
            ->with([
                 'email'=>$this->user_info->email,
                 'token'=>$this->user_info->token,
            ]);
    }
}
