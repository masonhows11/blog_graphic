<?php

namespace App\Providers;

use App\Events\RegisterUserEvent;
use App\Events\ResetPasswordEvent;
use App\Listeners\SendResetPasswordLink;
use App\Listeners\SendVerificationEmailListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegisterUserEvent::class =>[
            SendVerificationEmailListener::class,
        ],
        ResetPasswordEvent::class=>[
            SendResetPasswordLink::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //

    }

}
