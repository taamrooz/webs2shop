<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        {{-- CSS --}}
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <!--Insert header here-->
        <header>
            <nav class="navbar" id="navbar">
                <ul>
                    <li id="escapeHatch">
                        <a href="{{ public_path() }}/">
                            <img src="{{ asset('img/sigil.svg') }}" alt="Home">
                            <span>Webshopnaam</span>
                        </a>
                    </li>
                    <li>Producten</li>
                    <li>Winkelwagen</li>
                    <li>Inloggen</li>
                    <li id="toggleMenu" onclick="toggleMenu()">&#9776;</li>
                </ul>
            </nav>
        </header>

        <div class="centerContent">
            @yield('content')

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
                <p class="colofon">Privacy policy - &copy; {{ date('Y') }}</p>
            </footer>
        </div>

        <script>
            function toggleMenu(){
                var x = document.getElementById("navbar");
                if (x.className === "navbar") {
                    x.className += " responsive";
                } else {
                    x.className = "navbar";
                }
            }
        </script>
    </body>
</html>
