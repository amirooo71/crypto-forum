<div class="columns is-multiline">
    @forelse($threads as $thread)
        <div class="column is-6">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-right is-paddingless">
                            <figure class="image is-48x48">
                                <img src="{{$thread->owner->avatar_path}}"
                                     alt="{{$thread->owner->name}}">
                            </figure>
                        </div>
                        <div class="media-content is-clipped">
                            <div class="is-pulled-right">
                                <p class="is-size-6">
                                    <a href="{{route('profile',$thread->owner)}}">{{$thread->owner->name}}</a>
                                </p>
                                <p class="is-size-7 is-pulled-right">امیر@</p>
                            </div>
                            <div class="is-pulled-left">
                                <p class="is-size-7 is-hidden-mobile">بیتکوین</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-image">

                    <figure class="image is-3by2">
                        <img src="https://bulma.io/images/placeholders/1280x960.png"
                             alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="columns">
                        <div class="column is-paddingless">
                            <div class="is-inline-flex is-black">
                                <div class="tags has-addons">
                                    <span class="tag is-light">
                                        <span class="icon has-text-black">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </span>
                                    <span class="tag is-info">
                                        {{$thread->visits()->count()}}
                                    </span>
                                </div>
                                <div class="tags has-addons mg-r-5">
                                    <span class="tag is-light">
                                        <span class="icon has-text-black">
                                            <i class="far fa-comment"></i>
                                        </span>
                                    </span>
                                    <span class="tag is-info">
                                        {{$thread->replies_count}}
                                    </span>
                                </div>
                                <div class="is-clearfix"></div>
                            </div>
                            <div class="is-pulled-left has-icon has-text-info">
                                <p class="is-size-7">چهار ساعت پیش</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-paddingless">
                            <a href="{{$thread->path()}}">
                                @if(auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                                    <strong>
                                        {{str_limit($thread->title,30)}}
                                    </strong>
                                @else
                                    {{str_limit($thread->title,30)}}
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>There are no relevant results at this time.</p>
    @endforelse
</div>

