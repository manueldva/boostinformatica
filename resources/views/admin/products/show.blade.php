@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Ver </strong>
				</div>
		
				<div class="panel-body">
					<p> <strong>Codigo:</strong> {{ $product->id }}</p>

					<p> <strong>Tipo Producto:</strong> {{ $product->producttype->description }}</p>

					<p> <strong>Descripcion:</strong> {{ $product->description }}</p>
					
					<p> <strong>Precio:</strong> {{ $product->price }}</p>
					
					<p> <strong>Stock:</strong> {{ $product->stock }}</p>
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
