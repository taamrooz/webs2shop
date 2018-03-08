<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        {{-- JQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        {{-- CSS --}}
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <header>
            <nav class="navbar" id="navbar">
                <ul>
                    <li id="escapeHatch">
                        <a href="{{ public_path() }}/">
                            <img src="{{ asset('img/sigil.svg') }}" alt="Home">
                            <span><b>Webshopnaam</b></span>
                        </a>
                    </li>
                    <li>Producten</li>
                    <li>Winkelwagen</li>
                    <li>Inloggen</li>
                </ul>
            </nav>
        </header>


        <input type="checkbox" name="toggleMenuInput" id="toggleMenuInput"/>
        <div class="menuOpenedBackground"></div>
        <label for="toggleMenuInput" id="toggleMenu">&#9776;</label>


        <div class="centerContent">
            <div class="content">
                @yield('content')
            </div>
            <footer class="row footer">
                <div class="footerContent">
                    <ul>
                        <li>
                            <h3>Media</h3>
                            <p></p>
                        </li>
                        <li>
                            <h3>Nieuwsbrief</h3>
                            <button href="#">Meld je aan!</button>
                        </li>
                        <li>
                            <h3>Over ons</h3>
                            <p>Wij zijn een webshop die graag onkruid verkoopt aan jou!</p>
                        </li>
                    </ul>
                </div>
                <p class="colofon">Made by: Tom Roozen and Jan ten Haaf - &copy; {{ date('Y') }}</p>
            </footer>
        </div>

        <script>

            $(document).ready(function(){

                var x = document.getElementById("navbar");

                $(window).resize(function() {

                    if ($(window).width() > 641) {

                        $('input[name=toggleMenuInput]').prop('checked', false);
                        x.className = "navbar";

                    }else{

                        if($('input[name=toggleMenuInput]').is(':checked')){

                            x.className += " menuOpened";

                        }else{

                            x.className = "navbar";

                        }
                    }
                });
            });
        </script>
    </body>
</html>
