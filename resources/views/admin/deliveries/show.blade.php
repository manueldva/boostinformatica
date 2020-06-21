@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Ver </strong>
					
					<a  href="{{ route('print', $delivery->id) }}" class="btn btn-sm btn-default pull-right" target="_blank">
						Imprimir Detalle
					</a>
					<a  href="{{ route('printvoucherdelivery', $delivery->id) }}" class="btn btn-sm btn-default pull-right" target="_blank">
						
						Imprimir Comprobante
					</a>
					
				</div>
		
				<div class="panel-body">
					<p> <strong>Codigo:</strong> {{ $delivery->reception->id }}</p>

					<p> <strong>Cliente:</strong> {{ $delivery->reception->client->name }}</p>

					<p> <strong>Equipo:</strong> {{ $delivery->reception->equipment->description }}</p>
					
					<p> <strong>Trabajo Hecho:</strong> {{ $delivery->workDone }}</p>
					@if($delivery->cost)
						<p> <strong>Costo Reparación/Producto:</strong> {{ $delivery->cost }}</p>
					@endif
					
					@if($delivery->observationCost)
						<p> <strong>Observación Costo:</strong> {{ $delivery->observationCost }}</p>
					@endif

					<p> <strong>Fecha:</strong> {{ $delivery->deliverDate }}</p>

					<p> <strong>Precio Trabajo:</strong> {{ $delivery->workPrice }}</p>

					@if($delivery->repaired == 'NOT')
						<p> <strong>Equipo Reparado:</strong>No</p>
					@else
						<p> <strong>Equipo Reparado:</strong>Si</p>
                    @endif
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
