@extends('index')

@section('content')
    <h1>Nieuwe order aanmaken</h1>

    <div class="col-lg-9">
        <h1>&nbsp;</h1>
        {{ Form::open(array('action' => 'OrderController@store', 'method' => 'POST')) }}

        <div class="form-group row">
            {{ Form::label('titel', 'Titel', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('titel', '', ['class'=>'form-control col-sm-10', 'placeholder'=>'Titel']) }}
            @if($errors->has('titel'))
                <div class="alert alert-danger">{{ $errors->first('titel') }}</div>
            @endif
        </div>

        <div class="form-group row">
            {{ Form::label('prijs', 'Prijs', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('prijs', '', ['class'=>'form-control col-sm-10', 'placeholder'=>'Prijs']) }}
            @if($errors->has('prijs'))
                <div class="alert alert-danger">{{ $errors->first('prijs') }}</div>
            @endif
        </div>
        <div class="form-group row">
            {{ Form::label('beschrijving', 'Beschrijving', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::textarea('beschrijving','', ['class'=>'form-control col-sm-10', 'placeholder'=>'Beschrijving', 'size' => '30x5']) }}
            @if($errors->has('beschrijving'))
                <div class="alert alert-danger">{{ $errors->first('beschrijving') }}</div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::submit('Aanmaken', ['class' => 'btn btn-success'])}}
        </div>
    </div>

    {{ Form::close() }}
@endsection