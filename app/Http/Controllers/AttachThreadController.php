<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttachThreadController extends Controller
{
    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($token)
    {
        $thread = Thread::where('thread_token', $token)->first();
        if ($thread) {
            return response()->json($thread, Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'تحلیل یافت نشد.'], Response::HTTP_NO_CONTENT);
        }
    }

    public function store(Thread $thread)
    {

        if ($thread->user_id !== auth()->id()) {
            if (\request()->wantsJson()) {
                return \response()->json(['status' => 'Permission denied'], Response::HTTP_FORBIDDEN);
            }
        }

        \request()->validate([
            'body' => 'required|spamfree',
        ]);

        $comment = $thread->addComment([
            'body' => \request()->body,
            'image_url' => \request()->image_url,
            'slug' => \request()->slug
        ]);

        return response()->json(
            [
                'message' => 'تحلیل با موفقیت ثبت شد.',
                'comment' => $comment,
            ]
            , Response::HTTP_CREATED);
    }
}
