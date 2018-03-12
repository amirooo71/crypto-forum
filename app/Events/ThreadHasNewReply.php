<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ThreadHasNewReply
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    var $thread, $reply;

    /**
     * ThreadHasNewReply constructor.
     * @param $thread
     * @param $reply
     */
    public function __construct($thread, $reply)
    {
        $this->thread = $thread;
        $this->reply = $reply;
    }


}
