@extends('index')

@section('content')
{{ Breadcrumbs::render('categoryedit', $category) }}
	<h1>Categorie aanpassen</h1>

	<div class="col-lg-9">
		<h1>&nbsp;</h1>
		{{ Form::model($category, ['route' => ['admin.categorieen.update', $category->categorie], 'method' => 'PATCH']) }}

		<div class="form-group row">
            {{ Form::label('categorie', 'Categorie', ['class'=>'col-sm-2 col-form-label']) }}
            {{ Form::text('categorie', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Categorie']) }}
            @if($errors->has('categorie'))
                <div class="alert alert-danger">{{ $errors->first('categorie') }}</div>
            @endif
        </div>
		<div class="form-group">
			{{ Form::submit('Update', ['class' => 'btn btn-success'])}}
		</div>
	</div>

	{{ Form::close() }}

@endsection()