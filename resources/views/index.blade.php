<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Tab icon --}}
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        {{-- CSS --}}
        {{ Html::style('css/index.css') }}

        {{-- JQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <title>ONKRUID KOPEN</title>

    </head>
    <body>

        {{-- Blurry layer --}}
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="blur-svg">
            <defs>
                <filter id="blur-filter">
                    <feGaussianBlur stdDeviation="3"></feGaussianBlur>
                </filter>
            </defs>
        </svg>

        {{-- Hamburger menu toggle --}}
        <label for="toggleMenuInput" id="toggleMenu" onclick="toggleBlur()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </label>
        <input type="checkbox" name="toggleMenuInput" id="toggleMenuInput"/>

        {{-- Get the kind of user --}}
        <?php
        if(Auth::user() === null) {
            $userLevel = 0;
        }else{
            if(Auth::user()->isAdmin()){
                $userLevel = 2;
            }else{
                $userLevel = 1;
            }
        }
        ?>

        {{-- Menu in sidebar --}}
        <div class="sideBar disable_scroll_main_page">
            <ul>
                @foreach(DB::table('menu')->get() as $menuItem)
                    @if($userLevel == $menuItem->user_level || $menuItem->user_level == 10 || ($userLevel > 1 && $menuItem->user_level >= 1))
                        <li class="{{ Request::is($menuItem->path) || Request::is($menuItem->path.'/*') ? 'active' : '' }}"><a href="/{{ $menuItem->path }}">{{ $menuItem->label }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        {{-- Everything at z-index 0 so it can be blurred out when something pops up--}}
        <div id="blur">

            {{-- Navbar --}}
            <header>
                <nav class="navbar row" id="navbar">
                    <ul>
                        <li id="escapeHatch">
                            <a href="/">
                                <img src="{{ asset('img/sigil.svg') }}" alt="Home">
                                <span><b>Ackerwildkrauter</b></span>
                            </a>
                        </li>
                        @foreach(DB::table('menu')->get() as $menuItem)
                            @if($userLevel == $menuItem->user_level || $menuItem->user_level == 10 || ($userLevel > 1 && $menuItem->user_level >= 1))
                                <li class="{{ Request::is($menuItem->path) || Request::is($menuItem->path.'/*') ? 'active' : '' }}"><a href="/{{ $menuItem->path }}">{{ $menuItem->label }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </header>

            <div class="centerContent">
                {{-- Mainstage --}}
                <div class="content">
                    {{-- Feedback messages --}}
                    @if(Session::has('msg'))
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Success!</strong> {!!Session::get('msg')!!}
                        </div>
                    @endif

                    @if(Session::has('warning'))
                        <div class="alert alert-warning">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Warning!</strong> {!!Session::get('warning')!!}
                        </div>
                    @endif

                    @yield('content')
                </div>

                {{-- Footer --}}
                <footer class="footer">
                    <div class="row footerContent">
                        <ul>
                            <li>
                                <h3>Media</h3>
                                <p></p>
                            </li>
                            <li>
                                <h3>Nieuwsbrief</h3>
                                <button href="#" class="btn">Meld je aan!</button>
                            </li>
                            <li>
                                <h3>Over ons</h3>
                                <p>Wij zijn een webshop die graag onkruid verkoopt aan jou!</p>
                            </li>
                        </ul>
                    </div>
                    <p class="colofon">Website made by: Tom Roozen and Jan ten Haaf - &copy; {{ date('Y') }}</p>
                </footer>
            </div>
        </div>

        {{-- Scripts --}}
        <script>

            $(document).ready(function(){

                var x = document.getElementById("navbar");
                var blur = document.getElementById("blur");
                var hamburger = document.getElementById("toggleMenu");

                /* Check window width to retract the sidebar */
                $(window).resize(function() {

                    if ($(window).width() > 641) {

                        $('input[name=toggleMenuInput]').prop('checked', false);
                        x.className = "navbar row";
                        blur.className = "";
                        hamburger.className = "";

                    }else{

                        x.className = "navbar row";

                    }
                });

                /* Toggle the hamburger animation */
                $('#toggleMenu').click(function(){
                    $(this).toggleClass('open');
                });


                /* Disable scroll on main page, so the sidebar can be scrolled */
                $('.disable_scroll_main_page').bind('mousewheel DOMMouseScroll', function(e) {
                    var scrollTo = null;

                    if (e.type == 'mousewheel') {
                        scrollTo = (e.originalEvent.wheelDelta * -1);
                    }
                    else if (e.type == 'DOMMouseScroll') {
                        scrollTo = 40 * e.originalEvent.detail;
                    }

                    if (scrollTo) {
                        e.preventDefault();
                        $(this).scrollTop(scrollTo + $(this).scrollTop());
                    }
                });
            });

            /* Toggle the background blur */
            function toggleBlur() {
                var blur = document.getElementById("blur");
                if (blur.className === "blur") {
                    blur.className = "";
                } else {
                    blur.className = "blur";
                }
            }
        </script>
    </body>
</html>
