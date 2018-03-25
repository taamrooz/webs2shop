@extends('index')

@section('content')

    <div class="row">
        <div class="login card">
            <h3>Registreren</h3>
            <form method="post" action="/registreren">
                @csrf
                <input type="text" name="username" placeholder="Gebruikersnaam" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" autofocus>
                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                <input type="email" name="email" placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus>
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
                <input type="password" name="re-password" placeholder="Wachtwoord herhalen" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
                @if ($errors->has('re-password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('re-password') }}</strong>
                    </span>
                @endif

                {{-- Insert other fields here --}}

                <input type="submit" value="Registreren" class="btn">
            </form>
        </div>
    </div>

@endsection
