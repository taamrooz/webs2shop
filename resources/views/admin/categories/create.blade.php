@extends('index')

@section('content')
{{ Breadcrumbs::render('categorycreate') }}
    <h1>Nieuwe categorie aanmaken</h1>

    <div class="col-lg-9">
        <h1>&nbsp;</h1>
        {{ Form::open(array('action' => 'CategoryController@store', 'method' => 'POST')) }}

        <div class="form-group row">
            {{ Form::label('categorie', 'Categorie', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('categorie', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Categorie']) }}
            <select name="parent_id">
                <option value="">Nieuwe hoofdcategorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                @endforeach
            </select>
            @if($errors->has('categorie'))
                <div class="alert alert-danger">{{ $errors->first('categorie') }}</div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::submit('Aanmaken', ['class' => 'btn btn-success'])}}
        </div>
    </div>

    {{ Form::close() }}
@endsection