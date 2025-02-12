@extends('index')
@section('content')
{{ Breadcrumbs::render('adminproducts') }}
	<div class="">
		<a class="inspect btn" href="{{ URL::to('/admin/producten/aanmaken') }}">Aanmaken</a>
		<div class="products">
			@foreach($products as $product)
				<?php
				$shorttitle = substr($product->titel, 0,20)."...";
				$short = substr($product->beschrijving, 0, 93)."...";
				?>

				<div class="card product">
					<img style="max-width: 100%;max-height: 100%;" class="card-img" src="{{ $product->imageurl}}" alt="{{ $product->titel }}">
					<h3>{{ $shorttitle }}</h3>
					<p>{{ $short }}</p>
					<div class="product_options">
						<form method="post" action="/admin/producten/verwijder">
							{{ csrf_field() }}
							<input type="hidden" value="{{ $product->id }}" name="id">
							<button type="submit">Verwijder</button>
						</form>
						<a class="inspect btn" href="{{ URL::to('/producten/'.$product->id ) }}">Bekijk</a>
						<a class="inspect btn" href="{{ URL::to('/admin/producten/' . $product->id . '/aanpassen') }}">Aanpassen</a>
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