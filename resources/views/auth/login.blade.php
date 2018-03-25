@extends('index')

@section('content')

    <div class="row">
        <div class="login card">
            <h3>Inloggen</h3>
            <form method="post" action="inloggen">
                @csrf
                <input type="text" name="username" placeholder="Gebruikersnaam" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input type="password" name="password" placeholder="Wachtwoord" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <input type="submit" value="Inloggen" class="btn">
            </form>
        </div>
    </div>

@endsection
