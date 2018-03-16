@extends('index')
@section('content')
	<div class="products">
		@foreach($products as $product)

			<div class="card">
				<img class="card-img" src="http://via.placeholder.com/350x225" alt="{{ $product->titel }}">
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