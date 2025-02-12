@extends('index')

@section('content')
	{{ Breadcrumbs::render('catalog') }}
	<div class="row">
		<div class="catalogus">
			<div class="filter card">
				<div class="filter_header">
					<h3>Filter</h3>
					<img src="{{ asset('img/sort.svg') }}" alt="Sorteren">
				</div>
				<div class="search_bar">
					<input type="text" width="100%" placeholder="Zoeken" class="search">
				</div>
				<div class="categories">
					<h4>Categorieën</h4>
                    <form method="post" action="/producten">
                        {{ csrf_field() }}
                        <ul>
							{{--TODO make this foldable--}}

							@foreach($categories as $category)
								<div class="category">
									<h3>{{ $category->categorie }}</h3>
                                    <?php
                                    foreach($subCategories[$category->id] as $subCategory) {

                                        // Check if category is checked
                                        $checked = '';

                                        if(session()->has('filter')){
                                            $index = in_array($subCategory->id, session()->get('filter', []));
                                            if($index !== false){
                                                $checked = 'checked';
                                            }
                                        }

                                        echo "<li><label for='".$subCategory->categorie."'>
										<input onchange='this.form.submit()'
											type='checkbox' name='category[]'
											value='".$subCategory->id."'
											id='".$subCategory->categorie."'
											".$checked."
										>
										".$subCategory->categorie."
										</label></li>";
                                    }
                                    ?>
								</div>
							@endforeach
                        </ul>
                    </form>
				</div>
			</div>
			<div class="products">
				@foreach($products as $product)
					<?php
					$short = substr($product->beschrijving, 0, 93)."...";
					?>

					<div class="card product" data-title="{{ $product->titel }}" data-price="{{ $product->prijs }}" data-category="{{ $product->category }}">
						<img style="max-width: 100%;max-height: 100%;" class="card-img" src={{ $product->imageurl }} alt="{{ $product->titel }}">
						<h3>{{ $product->titel }}</h3>
						<p>{{ $short }}</p>
						<div class="product_options">
							<form method="post" action="/addToCart">
								{{ csrf_field() }}
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<button type="submit" class="btn"><img src="{{ asset('/img/add_cart.svg') }}" alt="Voeg toe aan winkelwagen"></button>
							</form>
							<a class="inspect btn" href="{{ URL::to('/producten/'.$product->id ) }}">Bekijk</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<script>

		// Ask if the admin really wants to delete it
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

		// Filter using some magic
        $(document).ready(function(){
            $('.search').on('keyup', function(){
                var input = $(this).val().toLowerCase();
                $('.products .product').each(function(){
					if(input === ''){
						$(this).show();
					}
					var title = $(this).data('title').toLowerCase();
					if(~title.indexOf(input) >= 0){
					   $(this).hide();
					}else{
					   $(this).show();
					}
                });
            });
        });
	</script>
@endsection