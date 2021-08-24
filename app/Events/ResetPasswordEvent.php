<?php

namespace App\Events;


use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_info;

    /**
     * Create a new event instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        //
        $this->user_info= $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
   /* public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }*/
}
