@extends('index')

@section('content')

    <div class="account">
        <div class="personal_information card">
            <h1>Persoonlijke gegevens</h1>
            <ul>
                <li>Naam: {{ $user->name }}</li>
                <li>E-mail: {{ $user->email }}</li>
            </ul>
        </div>
        <div class="orders card">
            <h1>Bestellingen</h1>
        </div>
    </div>

@endsection()