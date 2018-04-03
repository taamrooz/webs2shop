@extends('index')
@section('content')
{{ Breadcrumbs::render('admincategories') }}
	<div class="">
		<a class="inspect btn" href="{{ URL::to('/admin/categorieen/aanmaken') }}">Aanmaken</a>
		<div class="categories">
			<table>
				<thead>
					<td>Naam:</td>
					<td>Is subcategorie van:</td>
					<td>Opties:</td>
				</thead>
				@foreach($categories as $category)
					<?php
					if(DB::table('categories')->find($category->parent_id) != null){
                        $parent = DB::table('categories')->find($category->parent_id)->categorie;
					}else {
					    $parent = 'Hoofdcategorie';
					}
					?>
					<tr>
						<td>{{ $category->categorie }}</td>
						<td>{{ $parent }}</td>
						<td class="product_options">
							<form method="post" action="/admin/categorieen/verwijder">
								{{ csrf_field() }}
								<input type="hidden" value="{{ $category->id }}" name="id">
								<button class="btn inspect" type="submit">Verwijder</button>
							</form>
							<a class="inspect btn" href="{{ URL::to('/admin/categorieen/' . $category->id . '/aanpassen') }}">Aanpassen</a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>


	<script>
		$(document).on('click', '.delete-button', function (e) {

			e.preventDefault();

			var id = $(this).data('id');

			swal({

				title: "Weet je het zeker?",
				icon: "warning",
				buttons: {
					cancel: true,
					confirm: true,
				}

			}).then(okay => {

				if(okay) {
						// Delete module
						$('#' + id).submit();
					}
					// Cancel
					return;

				});
		});
	</script>
@endsection