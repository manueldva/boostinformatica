@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Ver Recepción</strong>	
					</a>
					@if($reception->status == 'RECEIVED')
						<a  href="{{ route('printvoucherreception', $reception->id) }}" class="btn btn-sm btn-default pull-right" target="_blank">
							Imprimir Comprobante
						</a>
					@endif
				</div>
		
				<div class="panel-body">
					<p> <strong>Codigo:</strong> {{ $reception->id }}</p>

					<p> <strong>Cliente:</strong> {{ $reception->client->name }}</p>
					
					<p> <strong>Equipo:</strong> {{ $reception->equipment->description }}</p>

					@if($reception->imei)
						<p> <strong>Numero de IMEI:</strong> {{ $reception->imei }}</p>
                    @endif

					<p> <strong>Descripción:</strong> {{ $reception->description }}</p>

					<p> <strong>Razón:</strong> {{ $reception->reason->description }}</p>

					<p> <strong>Concepto:</strong> {{ $reception->concept }}</p>
					@if($reception->budget)
						<p> <strong>Presupuesto:</strong> {{ $reception->budget }}</p>
                    @endif
					
					@if($reception->drums == 'NOT')
						<p> <strong>Entrego Bateria/Cargador:</strong>No</p>
					@else
						<p> <strong>Entrego Bateria/Cargador:</strong>Si</p>
                    @endif

					@if($reception->file)
					<p> <strong>Imagen:</strong></p>
                        <img src="{{ $reception->file }}" class="img-responsive">
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
