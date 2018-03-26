@extends('index')

@section('content')
<div class="col-lg-9">
    <div class="row">
        <div class="card mt-4">
            @if($product->image == null)
            <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
            @else
            <img class="card-img-top img-fluid show-banner" src="data:image/gif;base64,{{$product->image}}"
            alt="">
            @endif
            <div class="card-body">
                <h3 class="card-title">{{$product->titel}}</h3>
                <h4>
                    @isset($product->prijs)
                    {{ "$" . $product->prijs }}
                    @endisset
                    </h4>
                    <div class="card">
                        <div class="card-block">
                            <p class="card-text" style="margin: 10px">{{$product->beschrijving}}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Kenmerken
                        </div>
                        <div class="card-block">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection