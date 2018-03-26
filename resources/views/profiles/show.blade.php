@extends('layouts.app')

@section('content')

    <section class="hero is-desktop is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-4-tablet is-offset-2-desktop has-text-right has-text-centered-mobile is-bold">
                        <span class="has-text-light">امتیاز</span>
                        <h4 class="is-white is-1 title">
                            1,000
                        </h4>
                    </div>
                    <div class="column is-6-desktop is-8-tablet">
                        <div class="media">
                            <div class="media-content has-text-centered-mobile is-clipped">
                                <div class="is-vertical is-block-mobile">
                                    <span class="is-size-1 is-hidden-mobile">{{$profileUser->name}}</span>
                                </div>
                            </div>
                            <div class="media-left">
                                <avatar-form :user="{{$profileUser}}"></avatar-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @forelse($activities as $date => $activity)
                        <h3 class="activity-header">
                            <p class="has-text-grey">
                                <i class="far fa-calendar"></i>
                                {{$date}}
                            </p>
                        </h3>
                        @foreach($activity as $record)
                            @if(view()->exists("profiles.activities.{$record->type}"))
                                @include("profiles.activities.{$record->type}",['activity' => $record])
                            @endif
                        @endforeach
                    @empty
                        <p>بدون فعالیت.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection