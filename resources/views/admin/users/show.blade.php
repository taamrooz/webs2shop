@extends('index')

@section('content')
{{ Breadcrumbs::render('usershow', $user) }}
<div class="row">
    <div class="card">
        <div class="user_information">
            <h3 class="card-title">Gebruiker id: {{$user->id}}</h3>
            <h4>Gebruiker: {{$user->name}}</h4>
                <ul class="font-weight-bold">Lijst met orders
                @foreach($user->orders as $order)
                	<li>{{ $order->id }}</li>
                @endforeach
                </ul>
        </div>
    </div>
</div>

@endsection