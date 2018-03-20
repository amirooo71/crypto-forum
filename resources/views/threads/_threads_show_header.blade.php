<section class="hero is-primary">
    <div class="hero-body">

        <div class="columns">
            <div class="column is-8">
                <div class="container">
                    <div class="content">
                        <h3 class="has-text-white">
                            {{$thread->title}}
                        </h3>
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
                            <div class="mg-r-5">
                                <p class="has-text-light">
                                    یک ساعت پیش
                                </p>
                            </div>
                            <div class="is-clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="media">
                    <div class="media-content is-clipped">
                        <div class="is-pulled-left">
                            <a href="/profiles/{{$thread->owner->name}}" class="is-size-5">
                                {{$thread->owner->name}}
                            </a>
                            <p class="is-size-7">
                                {{$thread->owner->name}}@
                            </p>
                            <p>
                                عضویت {{$thread->owner->created_at}}
                            </p>
                        </div>
                    </div>
                    <div class="media-left is-pulled-left">
                        <figure class="image is-64x64">
                            <img src="{{$thread->owner->avatar_path}}" alt="{{$thread->owner->name}}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>