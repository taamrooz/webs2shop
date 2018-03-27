@extends('index')

@section('content')
	<div class="row">
		<div class="catalogus">
			<div class="filter card">
				<div class="filter_header">
					<h3>Filter</h3>
					<img src="{{ asset('img/sort.svg') }}" alt="Sorteren">
				</div>
				<div class="search">
					<input type="text" width="100%" placeholder="Zoeken">
				</div>
				<div class="categories">
					<h4>Categorieën</h4>
					<ul>
					<?php
						$categories[] = array();
						foreach($products as $product) {
							if(!in_array($product->categorie, $categories)) {
								echo "<li><label for='".$product->categorie."'><input type='checkbox' name='".$product->categorie."' id='".$product->categorie."'> ".$product->categorie."</label></li>";
								$categories[] = $product->categorie;
							}
						}
					?>
					</ul>
				</div>
				<div class="price">
					<h4>Prijs</h4>
					<input type="text" name="min_price" id="min_price">
					<input type="text" name="php artisan max_price" id="max_price">
				</div>
			</div>
			<div class="products">
				@foreach($products as $product)
					<?php
					$short = substr($product->beschrijving, 0, 93)."...";
					?>

					<div class="card product">
						<img class="card-img" src="http://via.placeholder.com/350x225" alt="{{ $product->titel }}">
						<h3>{{ $product->titel }}</h3>
						<p>{{ $short }}</p>
						<div class="product_options">
							<a class="inspect btn" href="{{ URL::to('/producten/'.$product->id ) }}">Bekijk</a>
						</div>
					</div>
				@endforeach
			</div>
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