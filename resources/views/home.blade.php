@extends('index')

@section('content')

    <div class="home">
        <div class="home_banner">
            <img src="{{ asset('/img/onkruid-banner.jpg') }}">
            <div class="row">
                <h1>Onkruid voor iedere tuin!</h1>
            </div>
        </div>
        <div class="row">
            <p>Bekijk onze nieuwe collectie!</p>
            <a class="btn" href="/producten">Producten</a>
        </div>
    </div>
@endsection