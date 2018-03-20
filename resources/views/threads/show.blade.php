@extends('layouts.app')

@section('stylesheets')
    <link href="{{ asset('css/vendor/jquery.atwho.css') }}" rel="stylesheet">
@endsection

@section('content')

    @include('threads._threads_show_header')

    <thread-view data-replies-count="{{$thread->replies_count}}" :thread="{{$thread}}" inline-template class="mg-t-30">
        <div class="container">
            <div class="columns">
                <div class="column is-8" v-cloak>

                    @include('threads._question')

                    <replies @added="repliesCount++" @removed="repliesCount--"></replies>

                </div>
                <div class="column" v-cloak>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-title has-text-info">
                                تعداد کامنت های ثبت شده
                            </div>
                            <div class="card-header-icon">
                                <span v-text="repliesCount"></span>
                            </div>
                        </div>
                        <div class="card-content">
                            <subscribe-button :active="{{json_encode($thread->isSubscribedTo)}}" v-if="signedIn"></subscribe-button>
                            <button class="btn btn-default btn-block" v-if="authorize('isAdmin')"
                                    v-text="locked ? 'Unlock' : 'Lock'"
                                    @click="toggleLock">Lock
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>

@endsection
