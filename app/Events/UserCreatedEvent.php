<?php

namespace App\Events;

use Carbon\Traits\Serialization;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\User;
use Illuminate\Queue\SerializesModels;

class UserCreatedEvent
{
    use SerializesModels;

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
