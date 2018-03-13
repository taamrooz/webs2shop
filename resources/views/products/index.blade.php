@extends('layouts.productindex')
@section('content')
	@foreach($products as $product)
		<div class="col-md-3">
			<div class="card mb-4 box-shadow">
				<img class="card-img" src="http://via.placeholder.com/350x225" alt="Card image cap">
				<div class="card-body">
					<h3>{{$product->title}}</h3>
					<p class="card-text">{{$product->beschrijving}}</p>
					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
							<a href="{{ URL::to('modules/' . $product->id . '/edit') }}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
						</div>
						<small class="text-muted">{{ "Dagen" }}</small>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@endsection