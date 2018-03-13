<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\ThreadFilters;
use App\Inspections\Spam;
use App\Thread;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * @param Channel $channel
     * @param ThreadFilters $filters
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Channel $channel, ThreadFilters $filters)
    {
        $threads = $this->getThreads($channel, $filters);

        if (\request()->wantsJson()) {
            return $threads;
        }

        return view('threads.index', compact('threads'));
    }

    /**
     * @param $channel
     * @param Thread $thread
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function show($channel, Thread $thread)
    {
//        return $thread->load('replies');
//        return Thread::withCount('replies')->first();
//        return Thread::withCount('replies')->find(52);
        if (auth()->check()) {
            auth()->user()->read($thread);
        }
        return view('threads.show', compact('thread'));
    }

    /**
     * @param Request $request
     * @param Spam $spam
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request, Spam $spam)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id',
        ]);

        $spam->detect(\request('body'));

        $thread = Thread::create(
            [
                'user_id' => auth()->id(),
                'channel_id' => \request('channel_id'),
                'title' => \request('title'),
                'body' => \request('body'),
            ]
        );

        return redirect($thread->path())
            ->with('flash', 'Your Thread Has been published');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * @param $channel
     * @param Thread $thread
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy($channel, Thread $thread)
    {

        $this->authorize('update', $thread);

        $thread->delete();

        if (\request()->wantsJson()) {
            return response([], 204);
        }

        return redirect('/threads');
    }

    /**
     * @param Channel $channel
     * @param ThreadFilters $filters
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function getThreads(Channel $channel, ThreadFilters $filters)
    {
        $threads = Thread::latest();
        if ($channel->exists) {
            $threads->where('channel_id', $channel->id);
        }
        $threads = $threads->filter($filters)->get();
        return $threads;
    }

}
