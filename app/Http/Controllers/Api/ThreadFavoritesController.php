<?php

namespace App\Http\Controllers\Api;

use App\Reputation;
use App\Thread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThreadFavoritesController extends Controller
{
    /**
     * FavoritesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Thread $thread)
    {
        $thread->favorite();
        (new Reputation)->award(auth()->user(), Reputation::THREAD_FAVORITED);
        return back();
    }

    /**
     * @param Thread $thread
     */
    public function destroy(Thread $thread)
    {
        $thread->unfavorite();
        (new Reputation)->reduce(auth()->user(), Reputation::THREAD_FAVORITED);
    }
}
