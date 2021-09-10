<?php

namespace App\Mail;

use App\Events\RegisterUserEvent;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('auth.email_verification.email_verification')
            ->with([
                'name'=>$this->user->name,
                'activation_code' =>$this->user->activation_code,
            ]);
    }
}
