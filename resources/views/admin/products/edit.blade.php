@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> Editar Producto </strong>
				</div>
		
				<div class="panel-body">

					{!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}
                        
                        @include('admin.products.partials.form')

                    {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection