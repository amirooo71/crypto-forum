@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{$profileUser->name}}
            </h1>
            <small>{{$profileUser->created_at->diffForHumans()}}</small>
        </div>

        @foreach($threads as $thread)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <span class="flex">
                    <a href="/profiles/{{$thread->owner->name}}">{{$thread->owner->name}}</a> <i>posted : </i>
                            {{$thread->title}}
                        </span>
                        <span>{{$thread->created_at->diffForHumans()}}</span>
                    </div>
                </div>
                <div class="panel-body">
                    {{$thread->body}}
                </div>
            </div>
        @endforeach

    </div>
@endsection