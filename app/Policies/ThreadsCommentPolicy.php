<?php

namespace App\Policies;

use App\User;
use App\ThreadsComment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadsCommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the threadsComment.
     *
     * @param  \App\User  $user
     * @param  \App\ThreadsComment  $threadsComment
     * @return mixed
     */
    public function view(User $user, ThreadsComment $threadsComment)
    {
        //
    }

    /**
     * Determine whether the user can create threadsComments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the threadsComment.
     *
     * @param  \App\User  $user
     * @param  \App\ThreadsComment  $threadsComment
     * @return mixed
     */
    public function update(User $user, ThreadsComment $threadsComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the threadsComment.
     *
     * @param  \App\User  $user
     * @param  \App\ThreadsComment  $threadsComment
     * @return mixed
     */
    public function delete(User $user, ThreadsComment $threadsComment)
    {
        //
    }
}
