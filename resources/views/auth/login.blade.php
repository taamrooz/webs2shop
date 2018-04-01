@extends('index')

@section('content')

    <div class="row">
        <div class="login card">
            <h3>Inloggen</h3>
            <form method="post" action="inloggen">
                @csrf
                <input type="email" name="email" placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus>
                <input type="password" name="password" placeholder="Wachtwoord" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
                @if($errors->has('message'))
                    <span class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </span>
                @endif
                <small>Nieuwe gebruiker?<br><a href="/registreren">Maak een nieuw account aan.</a></small>
                <input type="submit" value="Inloggen" class="btn">
            </form>
        </div>
    </div>
@endsection
