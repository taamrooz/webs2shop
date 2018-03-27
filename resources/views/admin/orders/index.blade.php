@extends('index')
@section('content')
	<div class="">
		<div class="products">
			@foreach($orders as $order)
				<div class="col-md-7 card">
					<h3>{{ $order->name }}</h3>
					<p>{{ $order->email }}</p>
					<div class="product_options">
						<a class="inspect btn" href="{{ URL::to('/admin/'.$order->id ) }}">Bekijk</a>
						<a class="inspect btn" href="{{ URL::to('/admin/gebruikers/' . $order->id . '/aanpassen') }}">Aanpassen</a>
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