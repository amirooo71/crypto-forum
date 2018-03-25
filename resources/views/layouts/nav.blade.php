<nav class="navbar navbar-default is-transparent mb-0">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div id="app-navbar-collapse" class="navbar-menu navbar-collapse">
            <div class="navbar-end">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">تحلیل ها <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/threads">همه تحلیل ها</a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li><a href="/threads?by={{auth()->user()->name}}">تحلیل های من</a></li>
                            @endif

                            <li><a href="/threads?popular=1">تحلیل های محبوب</a></li>
                            <li><a href="/threads?unanswered=1">تحلیل های بدون نظر</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="/threads/create">تحلیل جدید</a>
                    </li>
                    <li>
                        <a href="{{route('analysis.index')}}">نمودار</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">ارزها <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($channels as $channel)
                                <li><a href="/threads/{{$channel->slug}}">{{$channel->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="navbar-start">
                <ul class="nav navbar-nav navbar-left">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">ورود</a></li>
                        <li><a href="{{ route('register') }}">ثبت نام</a></li>
                    @else
                        <user-notifications></user-notifications>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('profile',\Illuminate\Support\Facades\Auth::user())}}">پروفایل</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>