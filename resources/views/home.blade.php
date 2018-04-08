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
            @include('_tile')
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
