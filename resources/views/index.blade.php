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
            <nav class="navbar">
                <ul>
                    <li id="escapeHatch">
                        <a href="{{ public_path() }}/">
                            <div>
                                <img src="{{ asset('img/sigil.svg') }}" alt="Home" heigt="40px" width="40">
                            </div>
                        </a>
                    </li>
                    <li><a class="no-decoration" href="{{ URL::to('/products') }}">Producten</a></li>
                    <li>Winkelwagen</li>
                    <li>Inloggen</li>
                </ul>
            </nav>
        </header>

        <div class="centerContent">
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
            <div class="row">
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
                <p class="colofon">Privacy policy - &copy; {{ date('Y') }}</p>
            </footer>
        </div>
    </body>
</html>
