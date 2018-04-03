@extends('index')

@section('content')
{{ Breadcrumbs::render('categoryedit', $category) }}
	<h1>'{{ $category->categorie }}' aanpassen</h1>

	<div class="col-lg-9">
		<form method="post" action="/admin/categorieen/aanpassen">
			{{ csrf_field() }}
			<div class="form-group row">
				<table>
					<tr>
						<td>{{ Form::label('categorie', 'Nieuwe naam:', ['class'=>'col-sm-2 col-form-label']) }}</td>
						<td>
							<input type="text" value="{{ $category->categorie }}" name="categorie"><br>
							<input type="hidden" name="id" value="{{ $category->id }}">
						</td>
					</tr>
					<tr>
						<td><label for="sub">Is subcategorie van:</label></td>
						<td>
							<select id="sub" name="parent_id">
								<option value="" {{ ($category->parent_id === null)? 'selected="selected"' : '' }}>Nieuwe hoofdcategorie</option>
								@foreach($categories as $categorie)
									@if($category->id != $categorie->id)
										<option value="{{ $categorie->id }}" {{ ($category->parent_id == $categorie->id) ? 'selected="selected"' : '' }}>{{ $categorie->categorie }}</option>
									@endif
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" value="Aanpassen"></td>
					</tr>
				</table>

				@if($errors->has('categorie'))
					<div class="alert alert-danger">{{ $errors->first('categorie') }}</div>
				@endif
			</div>
		</form>
		</div>
	</div>

	{{ Form::close() }}

@endsection()