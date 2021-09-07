@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> Editar Publicidad </strong>
				</div>
		
				<div class="panel-body">

					{!! Form::model($come, ['route' => ['comes.update', $come->id], 'method' => 'PUT']) !!}
                        
                        @include('admin.complements.comes.partials.form')

                    {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection