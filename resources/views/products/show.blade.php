@extends('index')

@section('content')
{{ Breadcrumbs::render('product', $product) }}
<div class="row">
    <div class="card">
        <img style="max-height: 400px; max-width: 900px;" class="card-img-top img-fluid show-banner" src="{{ $product->imageurl}}"
        alt="">
        <div class="product_information">
            <h3 class="card-title">{{$product->titel}}</h3>
            <h4>
                @isset($product->prijs)
                {{ "$" . $product->prijs }}
                @endisset
                </h4>
                <p style="max-width: 900px;">{{$product->beschrijving}}</p>
        </div>
        <div class="product_options">
            <form method="post" action="/addToCart">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="aantal" value="1">
                <button type="submit" class="btn"><img src="{{ asset('/img/add_cart.svg') }}" alt="Voeg toe aan winkelwagen"></button>
            </form>
        </div>
    </div>
</div>
@endsection