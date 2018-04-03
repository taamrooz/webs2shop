@extends('index')
@section('content')
{{ Breadcrumbs::render('admincategories') }}
	<div class="">
		<a class="inspect btn" href="{{ URL::to('/admin/categorieen/aanmaken') }}">Aanmaken</a>
		<div class="categories">
			@foreach($categories as $category)
				<div class="card category">
					<h3>{{ $category->categorie }}</h3>
					<div class="product_options">

						<a class="inspect btn" href="{{ URL::to('/admin/categorieen/' . $category->id . '/aanpassen') }}">Aanpassen</a>
					</div>
				</div>
			@endforeach
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