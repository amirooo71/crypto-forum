@extends('layouts.app')

@section('content')

    <thread-view initial-replies-count="{{$thread->replies_count}}" inline-template>
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
                                @can('update',$thread)
                                    <form action="{{$thread->path()}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-default">Delete thread</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                        <div class="panel-body">
                            {{$thread->body}}
                        </div>
                    </div>


                    <replies :data="{{$thread->replies}}" @added="repliesCount++" @removed="repliesCount--"></replies>

                    {{--{{$replies->links()}}--}}
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            This thread was published {{$thread->created_at->diffForHumans()}} by
                            <a href="">{{$thread->owner->name}}</a>, and currently
                            has <span v-text="repliesCount"></span>
                            {{str_plural('comment',$thread->replies_count)}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>

@endsection
