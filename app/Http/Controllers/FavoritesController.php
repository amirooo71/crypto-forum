<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use App\Reputation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    /**
     * FavoritesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Reply $reply)
    {
        $reply->favorite();
        (new Reputation)->award(auth()->user(), Reputation::REPLY_FAVORITED);
        return back();
    }

    /**
     * @param Reply $reply
     */
    public function destroy(Reply $reply)
    {
        $reply->unfavorite();
        (new Reputation)->reduce(auth()->user(), Reputation::REPLY_FAVORITED);

    }
}
