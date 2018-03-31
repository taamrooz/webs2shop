@extends('index')

@section('content')
    {{ Breadcrumbs::render('shoppingcart') }}
    <h1>winkelwagen</h1>

    @if(session()->exists('cart'))
        <div class="cart card">
            <small>Het kan zijn dat je nog producten in de winkelwagen hebt staan van de vorige keer.</small>
            <table>
                <tr>
                    <td>Product</td>
                    <td>Aantal</td>
                    <td>Prijs</td>
                    <td>Opties</td>
                </tr>
                <?php
                    $total = 0;
                ?>

                @foreach($products as $product)

                    <tr>
                        <form method="post" action="/winkelwagen/bijwerken">

                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $product->id }}" name="id">

                            <td><a href="/producten/{{ $product->id }}">{{ $product->titel }}</a></td>
                            <td><input type="number" value="{{ session()->get('cart')[$product->id] }}" name="amount"></td>
                            <td>€{{ $product->prijs * session()->get('cart')[$product->id] }}</td>
                            <td><button type="submit" class="btn">Bijwerken</button><a href="/winkelwagen/{{ $product->id }}/verwijder">Verwijderen</a></td>

                        </form>
                    </tr>

                    <?php
                        $total += $product->prijs * session()->get('cart')[$product->id];
                    ?>

                @endforeach
            </table>
            <hr>
            <div class="total">Totaal€{{ $total }}</div>
            <div class="options">
                <a href="/winkelwagen/leegmaken" class="btn">Winkelwagen leegmaken</a>
                <a href="/winkelwagen/bestellen" class="btn">Bestellen</a>
                {{--TODO Bestellen pagina?--}}
            </div>
        </div>
    @else

        <div>Geen producten gevonden</div>

    @endif

@endsection