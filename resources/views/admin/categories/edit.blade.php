@extends('index')

@section('content')
{{ Breadcrumbs::render('categoryedit', $category) }}
	<h1>Categorie aanpassen</h1>

	<div class="col-lg-9">
		<h1>&nbsp;</h1>
		<form method="post" action="/admin/categorieen/aanpassen">
			{{ csrf_field() }}
			<div class="form-group row">
				{{ Form::label('categorie', 'Categorie', ['class'=>'col-sm-2 col-form-label']) }}
				<input type="text" value="{{ $category->categorie }}" name="categorie">
				<input type="hidden" name="id" value="{{ $category->id }}">
				<select name="parent_id">
					<option value="">Nieuwe hoofdcategorie</option {{ ($category->id == null)?'.selected="selected".': ''}}>

					@foreach($categories as $categorie)
						@if($category->id != $categorie->id)
							<option value="{{ $categorie->id }}" >{{ $categorie->categorie }}</option>
						@endif
					@endforeach
				</select>
				<input type="submit" value="Aanpassen">
				@if($errors->has('categorie'))
					<div class="alert alert-danger">{{ $errors->first('categorie') }}</div>
				@endif
			</div>
		</form>
		</div>
	</div>

	{{ Form::close() }}

@endsection()