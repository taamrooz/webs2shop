@extends('index')
@section('content')
{{ Breadcrumbs::render('adminusers') }}
	<div class="">
		<a class="inspect btn" href="{{ URL::to('/admin/gebruikers/aanmaken') }}">Aanmaken</a>
		<div class="products">
			@foreach($users as $user)
				<div class="col-md-7 card">
					<h3>{{ $user->name }}</h3>
					<p>{{ $user->email }}</p>
					<div class="product_options">
						<a class="inspect btn" href="{{ URL::to('/admin/gebruikers/'.$user->id ) }}">Bekijk</a>
						<a class="inspect btn" href="{{ URL::to('/admin/gebruikers/' . $user->id . '/aanpassen') }}">Aanpassen</a>
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