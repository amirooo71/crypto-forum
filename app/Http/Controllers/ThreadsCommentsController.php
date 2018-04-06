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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Thread $thread)
    {
        $thread->addComment([
            'body' => \request()->body,
            'image_url' => \request()->image_url,
        ]);

        return response()->json(['message' => 'کامنت با موفقیت ثبت شد.'], Response::HTTP_CREATED);
    }
}
