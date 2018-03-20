@extends('index')
@section('content')
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
				{{--<div class="col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img" src="http://via.placeholder.com/350x225" alt="Card image cap">
                        <div class="card-body">
                            <h3>{{$product->title}}</h3>
                            <p class="card-text">{{$product->beschrijving}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ URL::to('products/' . $product->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                    <a href="{{ URL::to('products/' . $product->id . '/edit') }}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                    <form method="post" action="products/delete" id="{{ $product->id }}" class="btn-group">
                                        {{ csrf_field()}}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button type="button" class="btn btn-sm btn-outline-danger delete-button" data-id="{{ $product->id }}">Verwijder</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
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