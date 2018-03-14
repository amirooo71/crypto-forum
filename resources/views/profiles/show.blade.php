@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>
                        {{$profileUser->name}}
                        <small>Since {{$profileUser->created_at->diffForHumans()}}</small>
                    </h1>

                    @can('update',$profileUser)
                        <form action="{{route('avatar',$profileUser->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="avatar">
                            <button type="submit" class="btn">Add Avatar</button>
                        </form>
                    @endcan

                    <img src="/storage/{{$profileUser->avatar_path}}" alt="" width="50" height="50">

                </div>
                @forelse($activities as $date => $activity)
                    <h3 class="page-header">{{$date}}</h3>
                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include("profiles.activities.{$record->type}",['activity' => $record])
                        @endif
                    @endforeach
                @empty
                    <p>There no activity yet for this user.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection