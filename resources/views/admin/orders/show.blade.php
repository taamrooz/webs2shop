@extends('index')

@section('content')
{{ Breadcrumbs::render('ordershow', $order) }}
<div class="row">
    <div class="card">
        <div class="order_information">
            <h3 class="card-title">Order id: {{$order->id}}</h3>
            @if(Auth::user()->isAdmin())
                <h4>Besteld door: {{$order->user->name}}</h4>
                <small>Klantnummer: {{ $order->user->id }}</small>
                <strong>Lijst met producten</strong>
            @endif

            <table>
                <tr>
                    <td>Product</td>
                    <td>Aantal</td>
                    <td>Prijs</td>
                </tr>
                <?php $total = 0;?>
                @foreach($order->order_products()->get() as $order_product)
                    <?php $product = DB::table('products')->find($order_product->product_id) ?>
                    <tr>
                        <td><b>{{ $product->titel }}</b></td>
                        <td>{{ $order_product->amount }}</td>
                        <td>{{ $product->prijs * $order_product->amount }}</td>
                    </tr>

                    <?php
                        $total += $product->prijs * $order_product->amount;
                    ?>
                @endforeach
                <tr>
                    <td colspan="3">Totaalprijs: €{{ $total }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection