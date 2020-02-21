<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use App\User;

class UserCreatedEvent
{

    /**
     * Create a new event instance.
     *
     * @param \App\User $user
     * @return void
     *
     */

    public $user;
    public function __construct(User $user)
    {
        $this->user= $user;
    }
}
