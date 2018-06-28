@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="page-header">
                    <h1>{{ $profileUser->name }}
                        <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
                    </h1>
                </div>
                @foreach($threads as $thread)
                    <div class="card">
                        <div class="card-header">
                            <div class="level">
                                <span class="flex">
                                    <a href="#">{{ $thread->creator->name }} </a>posted
                                    <h5 class="card-title">{{ $thread->title }}</h5>
                                </span>
                                <span>{{ $thread->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $thread->body }}</p>
                        </div>
                    </div>
                @endforeach
                {{ $threads->links() }}
            </div>
        </div>
    </div>
@endsection

