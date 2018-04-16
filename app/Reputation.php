<?php

namespace App;

class Reputation
{
    const THREAD_WAS_PUBLISHED = 10;
    const REPLY_POSTED = 2;
    const BEST_REPLY_AWARDED = 50;
    const REPLY_FAVORITED = 5;
    const THREAD_FAVORITED = 100;

    /**
     * @param $user
     * @param $points
     */
    public function award($user, $points)
    {
        $user->increment('reputation', $points);
    }

    /**
     * @param $user
     * @param $points
     */
    public function reduce($user, $points)
    {
        $user->decrement('reputation', $points);
    }
}