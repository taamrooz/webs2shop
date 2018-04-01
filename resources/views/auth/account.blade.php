@extends('index')

@section('content')
    <div class="row">
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
                @foreach($orders as $order)
                    <div>
                        <a href="/orders/{{ $order->id }}"><h3>Ordernummer: {{ $order->id }}</h3></a>
                        <small>Geplaatst op: {{ $order->created_at }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection()