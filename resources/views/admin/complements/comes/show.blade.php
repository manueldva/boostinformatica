@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Ver Publicidad</strong>	
					<a  href="{{ route('comes.index') }}" class="btn btn-sm btn-default pull-right">
						Listado
					</a>
				</div>
		
				<div class="panel-body">
					<p> <strong>ID:</strong> {{ $come->id }}</p>

					<p> <strong>Descripciòn:</strong> {{ $come->description }}</p>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
