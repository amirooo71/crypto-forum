<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class LockedThreadsController extends Controller
{
    /**
     * @param Thread $thread
     */
    public function store(Thread $thread)
    {
        $thread->lock();
    }
}
