@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Crear Publicidad</strong>
				</div>
		
				<div class="panel-body">
					{!! Form::open(['route' => 'comes.store']) !!}

						@include('admin.complements.comes.partials.form')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection