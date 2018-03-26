@extends('layouts.app')

@section('content')

    <section class="hero is-bold is-info">

        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-vertically-centered">
                        <div class="is-text-column">
                            <h1 class="title">
                                مجمع تحلیل ارزهای دیجیتال
                            </h1>
                            <h2 class="subtitle">
                                تحلیل و نظرات خود را به اشتراک بگذارید
                            </h2>
                        </div>
                    </div>
                    <div class="column">
                        <figure class="image is-3by2">
                            <img src="{{asset('images/graph.svg')}}" alt="">
                        </figure>
                    </div>

                </div>
            </div>
        </div>

    </section>




    <div class="section is-medium">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <p class="title has-text-centered">همین حالا شروع کنید</p>
                    <div class="hero-buttons">
                        <a href="{{route('analysis.index')}}" class="button is-primary is-large">
                            ارسال تحلیل
                        </a>
                        <a href="{{route('threads')}}" class="button is-link is-large mr-1">
                            مشاهده تحلیل ها
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="section section-tile-landing">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child box">
                                <p class="title">نمودار حرفه ای</p>
                                <p class="subtitle">ابزارهای کاربردی برای تحلیلی دقیق تر</p>
                            </article>
                            <article class="tile is-child box">
                                امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                                مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                                اساسا مورد استفاده قرار گیرد.
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                                شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می
                                طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و
                                فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری
                                موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی
                                دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                گیرد.
                            </article>
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا
                            با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو
                            در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                            راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و
                            جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                        </article>
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        @if($thread)
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
                                    <img src="{{$thread->analysis->image_full_path}}"
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
                                            <p class="is-size-7">
                                                {{$thread->created_at->diffForHumans()}}
                                            </p>
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
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </div>



    <div class="section is-medium chart-section">
        <div class="container">
            <div class="columns">

                <div class="column has-text-centered box">
                    <p class="title has-text-grey-dark">نمودار لحظه ای قیمت</p>
                </div>
                <div class="column has-text-centered">
                    <a href="{{route('analysis.index')}}" class="button is-info is-large is-rounded">
                        <i class="fas fa-chart-bar"></i>
                        <span class="mr-1">
                        مشاهده نمودار
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="section is-mobile has-text-centered">
        <div class="container">
            <p class="title has-text-grey-dark">
                مارکت ها
            </p>
            <p class="subtitle has-text-grey-dark">
                مارکت های در دسترس ( به زودی مارکت های دیگر هم اضافه می شوند )
            </p>
            <div class="columns">
                <div class="column">
                    <figure class="image is-16by9">
                        <img src="{{asset('images/bifinex.svg')}}" alt="bitfinex">
                    </figure>
                </div>
                <div class="column is-hidden-mobile"></div>
                <div class="column">
                    <figure class="image is-16by9">
                        <img src="{{asset('images/binance.svg')}}" alt="binance">
                    </figure>
                </div>
            </div>
        </div>
    </div>




@endsection
