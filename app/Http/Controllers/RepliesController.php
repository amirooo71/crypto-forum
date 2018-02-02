<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * RepliesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $channelId
     * @param Thread $thread
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($channelId, Thread $thread, Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $thread->addReply(
            [
                'body' => \request('body'),
                'user_id' => auth()->id(),
            ]
        );

        return back();
    }
}
