@extends('index')

@section('content')
    <h1>Nieuwe order aanmaken</h1>

    <div class="col-lg-9">
        <h1>&nbsp;</h1>
        {{ Form::open(array('action' => 'OrderController@store', 'method' => 'POST')) }}


        <div class="form-group row">
            {{ Form::label('user_id', 'Gebruiker', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::select('user_id', $users, null, array('id' => 'id', 'class' => 'form-control input-sm')) }}
            @if($errors->has('user_id'))
                <div class="alert alert-danger">{{ $errors->first('user_id') }}</div>
            @endif
        </div>
        <div class="form-group row">
            {{ Form::label('products', 'Producten', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::select('products[]', $products, null, ['id' => 'products', 'multiple' => 'multiple']) }}
            @if($errors->has('products'))
                <div class="alert alert-danger">{{ $errors->first('products') }}</div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::submit('Aanmaken', ['class' => 'btn btn-success'])}}
        </div>
    </div>

    {{ Form::close() }}
@endsection