@extends('index')

@section('content')
{{ Breadcrumbs::render('ordershow', $order) }}
<div class="row">
    <div class="card">
        <div class="order_information">
            <h3 class="card-title">Order id: {{$order->id}}</h3>
            <h4>Gebruiker: {{$order->user->name}}</h4>
                <ul><strong>Lijst met producten</strong>
                @foreach($order->products as $product)
                	<li>{{ $product->titel }}</li>
                @endforeach
                </ul>
        </div>
    </div>
</div>

@endsection