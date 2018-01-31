@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">{{$thread->owner->name}}</a> <i>posted : </i>
                        {{$thread->title}}
                    </div>
                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if(auth()->check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{$thread->path().'/replies'}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="body" id="" cols="30" rows="10" class="form-control"
                                      placeholder="Have you somthing to say?"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <p class="text-center">Please <a href="{{route('login')}}">sing in</a> in to participate in this discussion
            </p>
        @endif
    </div>
@endsection
