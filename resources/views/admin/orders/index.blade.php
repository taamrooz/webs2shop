@extends('index')
@section('content')
{{ Breadcrumbs::render('adminorders') }}
	<div class="">
		<a class="inspect btn" href="{{ URL::to('/admin/orders/aanmaken') }}">Aanmaken</a>
		<div class="products">
			@foreach($orders as $order)
				<div class="col-md-7 card">
					<h3>{{ $order->id }}</h3>
					<p>{{ $order->user->name }}</p>
					<div class="product_options">
						<a class="inspect btn" href="{{ URL::to('/admin/orders/'.$order->id ) }}">Bekijk</a>
						<a class="inspect btn" href="{{ URL::to('/admin/orders/' . $order->id . '/aanpassen') }}">Aanpassen</a>
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