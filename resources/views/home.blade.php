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




    <div class="section">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">Hello World</p>
                        <p class="subtitle">What is up?</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">Foo</p>
                        <p class="subtitle">Bar</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">Third column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
            </div>


            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child box">
                                <p class="title">Vertical tiles</p>
                                <p class="subtitle">Top box</p>
                            </article>
                            <article class="tile is-child box">
                                <p class="title">Vertical tiles</p>
                                <p class="subtitle">Bottom box</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">Middle box</p>
                                <p class="subtitle">With an image</p>
                                <figure class="image is-4by3">
                                    <img src="https://bulma.io/images/placeholders/640x480.png">
                                </figure>
                            </article>
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">Wide column</p>
                            <p class="subtitle">Aligned with the right column</p>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                    pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                    feugiat facilisis.</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <div class="content">
                            <p class="title">Tall column</p>
                            <p class="subtitle">With even more content</p>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat
                                    pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat
                                    gravida libero rhoncus ut. Morbi maximus, leo sit amet vehicula eleifend, nunc dui
                                    porta orci, quis semper odio felis ut quam.</p>
                                <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a
                                    sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor
                                    lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi,
                                    fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus
                                    dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>
                                <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue
                                    lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed,
                                    gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis
                                    faucibus libero. Quisque non semper leo.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">Side column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
                <div class="tile is-parent is-8">
                    <article class="tile is-child box">
                        <p class="title">Main column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
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



    <div class="section is-small">

            sdfsdf

    </div>




@endsection
