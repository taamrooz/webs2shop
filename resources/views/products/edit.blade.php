@extends('layouts.productindex')

@section('content')
	<h1>Product aanpassen</h1>

	<div class="col-lg-9">
		<h1>&nbsp;</h1>
		{{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PATCH', 'files' => true)) }}

		<div class="form-group row">
            {{ Form::label('titel', 'Titel', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('titel', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Titel']) }}
            @if($errors->has('titel'))
                <div class="alert alert-danger">{{ $errors->first('titel') }}</div>
            @endif
        </div>

        <div class="form-group row">
            {{ Form::label('prijs', 'Prijs', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('prijs', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Prijs']) }}
            @if($errors->has('prijs'))
                <div class="alert alert-danger">{{ $errors->first('prijs') }}</div>
            @endif
        </div>
        <div class="form-group row">
            {{ Form::label('beschrijving', 'Beschrijving', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::textarea('beschrijving',null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Beschrijving', 'size' => '30x5']) }}
            @if($errors->has('beschrijving'))
                <div class="alert alert-danger">{{ $errors->first('beschrijving') }}</div>
            @endif
        </div>        
        {{--<div class="form-group row">--}}
            {{--{{ Form::label('image', 'Image', ['class'=>'col-sm-2 col-form-label']) }}--}}

            {{--<div class="col-sm-10">--}}
                {{--{{ Form::file('image', ['class'=>'']) }}--}}
            {{--</div>--}}

            {{--@if($errors->has('image'))--}}
                {{--<div class="alert alert-danger">{{ $errors->first('image') }}</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--<div class="alert alert-info">--}}
            {{--<p>--}}
                {{--<strong> Image dimensions go here</strong>--}}
            {{--</p>--}}
        {{--</div>--}}

		<div class="form-group">
			{{ Form::submit('Update', ['class' => 'btn btn-success'])}}
		</div>
	</div>

	{{ Form::close() }}

@endsection()