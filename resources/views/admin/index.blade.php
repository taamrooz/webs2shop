@extends('index')
@section('content')
	<div class="">
		<a href="{{ URL::to('admin/producten') }}"><button>Producten</button></a>
		<a href="{{ URL::to('admin/categorieen') }}"><button>Categorieën</button></a>
		<a href="{{ URL::to('admin/gebruikers') }}"><button>Gebruikers</button></a>
		<a href="{{ URL::to('admin/orders') }}"><button>Orders</button></a>
	</div>
@endsection