<?php

namespace App\Http\Controllers;

use App\Thread;
use App\ThreadsComment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ThreadsCommentsController extends Controller
{

    /**
     * @param Thread $thread
     * @return mixed
     */
    public function index(Thread $thread)
    {
        return $thread->comments;
    }


    /**
     * @param Thread $thread
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Thread $thread)
    {
        \request()->validate([
            'body' => 'required|spamfree',
        ]);

        $comment = $thread->addComment([
            'body' => \request()->body,
            'image_url' => \request()->image_url,
        ]);

        return response()->json(
            [
                'message' => 'کامنت با موفقیت ثبت شد.',
                'comment' => $comment,
            ]
            , Response::HTTP_CREATED);
    }
}
