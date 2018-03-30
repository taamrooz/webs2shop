@extends('index')

@section('content')
    <h1>Nieuwe gebruiker aanmaken</h1>

    <div class="col-lg-9">
        <h1>&nbsp;</h1>
        {{ Form::open(array('action' => 'UserController@store', 'method' => 'POST')) }}

        <div class="form-group row">
            {{ Form::label('name', 'Naam', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('name', '', ['class'=>'form-control col-sm-10', 'placeholder'=>'Naam']) }}
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group row">
            {{ Form::label('email', 'Email', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('email', '', ['class'=>'form-control col-sm-10', 'placeholder'=>'Email']) }}
            @if($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group row">
            {{ Form::label('password', 'Wachtwoord', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::password('password', ['class'=>'form-control col-sm-10', 'placeholder'=>'Wachtwoord']) }}
            @if($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <div class="form-group row">
            {{ Form::label('password_confirmation', 'Wachtwoord controle', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::password('password_confirmation', ['class'=>'form-control col-sm-10', 'placeholder'=>'Wachtwoord']) }}
            @if($errors->has('password_confirmation'))
                <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>
        <div class="form-group row">
            {{ Form::label('user_level', 'Gebruiker level', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('user_level', '', ['class'=>'form-control col-sm-10', 'placeholder'=>'Gebruiker level']) }}
            @if($errors->has('user_level'))
                <div class="alert alert-danger">{{ $errors->first('user_level') }}</div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::submit('Aanmaken', ['class' => 'btn btn-success'])}}
        </div>
    </div>

    {{ Form::close() }}
@endsection