@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Ver Tipo de Producto</strong>	
					<a  href="{{ route('producttypes.index') }}" class="btn btn-sm btn-default pull-right">
						Listado
					</a>
				</div>
		
				<div class="panel-body">
					<p> <strong>ID:</strong> {{ $producttype->id }}</p>

					<p> <strong>Descripciòn:</strong> {{ $producttype->description }}</p>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
