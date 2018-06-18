<?php

namespace App\Http\Controllers;

use App\Thread;
//use http\Env\Request;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $threads = Thread::latest()->get();

        return view('threads.index', compact('threads'));
    }

    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

    public function store(Request $request)
    {
        $thread = Thread::create([
           'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect($thread->path());
    }
    public function create()
    {
        return view('threads.create');
    }
}
