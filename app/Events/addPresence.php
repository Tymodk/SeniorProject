<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

use App\Students;
use App\Classes;

class addPresence implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $student;
    public $class;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Students $student, Classes $class )
    {
        $this->student = $student;
        $this->class = $class;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('class.'. $this->class->id);
    }
    public function broadcastWith()
    {
        return [
            $this->student,

        ];
    }

}
