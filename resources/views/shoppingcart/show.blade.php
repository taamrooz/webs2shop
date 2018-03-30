@extends('index')

@section('content')
{{ Breadcrumbs::render('shoppingcart') }}
    <h1>winkelwagen</h1>

    @if(session()->exists('cart'))
        <div class="cart">

            <?php
                $total = 0;
            ?>

            @foreach($products as $product)

                <div class="item">{{ $product->titel }} - {{ session()->get('cart')[$product->id] }}</div>

                <?php
                    $total += $product->prijs * session()->get('cart')[$product->id];
                ?>

            @endforeach

            <hr>
            <div class="total">Totaal€{{ $total }}</div>
            <div class="options">
                <button type="submit">Winkelwagen leegmaken</button>
                <button type="submit">Bewerken</button>
                <button type="submit">Bestellen</button>
            </div>
        </div>
    @else

        <div>Geen producten gevonden</div>

    @endif

@endsection