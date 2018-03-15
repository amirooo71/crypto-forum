<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\ThreadFilters;
use App\Thread;
use App\Trending;
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
     * @param Trending $trending
     * @return ThreadController|\Illuminate\Contracts\View\Factory|\Illuminate\Database\Query\Builder|\Illuminate\View\View
     */
    public function index(Channel $channel, ThreadFilters $filters, Trending $trending)
    {
        $threads = $this->getThreads($channel, $filters);

        if (\request()->wantsJson()) {
            return $threads;
        }

        return view('threads.index', [
            'threads' => $threads,
            'trending' => $trending->get(),
        ]);
    }

    /**
     * @param $channel
     * @param Thread $thread
     * @param Trending $trending
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($channel, Thread $thread, Trending $trending)
    {
//        return Thread::withCount('replies')->first();
        if (auth()->check()) {
            auth()->user()->read($thread);
        }

        $trending->push($thread);

        $thread->recordVisit();

        return view('threads.show', compact('thread'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|spamfree',
            'body' => 'required|spamfree',
            'channel_id' => 'required|exists:channels,id',
        ]);

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
        $threads = $threads->filter($filters);
        return $threads->paginate(25);
    }

}
