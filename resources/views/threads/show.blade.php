@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex">
                                 <a href="/profiles/{{$thread->owner->name}}">{{$thread->owner->name}}</a> <i>posted : </i>
                                {{$thread->title}}
                            </span>
                            <form action="{{$thread->path()}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-default">Delete thread</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{$replies->links()}}

                @if(auth()->check())
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
                @else
                    <p class="text-center">Please <a href="{{route('login')}}">sing in</a> in to participate in this
                        discussion
                    </p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        This thread was published {{$thread->created_at->diffForHumans()}} by
                        <a href="">{{$thread->owner->name}}</a>, and currently has {{$thread->replies_count}}
                        {{str_plural('comment',$thread->replies_count)}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
