@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="/profile/{{ $thread->creator->name }}">{{ $thread->creator->name }} </a>posted
                                {{ $thread->title }}
                            </span>
                            <span>
                                <form method="post" action="{{ $thread->path() }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link" type="submit">Delete Thread</button>
                                </form>
                            </span></div>
                        </div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
                <hr>

                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{ $replies->links() }}

                <hr>
                @if (auth()->check())
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" action="{{ $thread->path() . '/replies' }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="form-control" name="body" id="" rows="5"
                                              placeholder="Have something to say?"></textarea>

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this
                        disscussion</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="/profile/{{ $thread->creator->name }}">{{ $thread->creator->name }}</a>, and currently
                            has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection
