<?php

namespace App\Http\Controllers\Api;

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
        return back();
    }

    /**
     * @param Thread $thread
     */
    public function destroy(Thread $thread)
    {
        $thread->unfavorite();
    }
}
