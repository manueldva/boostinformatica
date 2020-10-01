@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> Editar Tipo de Producto </strong>
				</div>
		
				<div class="panel-body">

					{!! Form::model($producttype, ['route' => ['producttypes.update', $producttype->id], 'method' => 'PUT']) !!}
                        
                        @include('admin.complements.producttypes.partials.form')

                    {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection