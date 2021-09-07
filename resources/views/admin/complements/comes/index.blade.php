@extends('layouts.app')

@section('include_delete')
	@include('include.modal-delete')
@stop

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Lista de Publicidad</strong> 
					@if(Auth::user()->userType !== 'READONLY')
					<a href="{{ route('comes.create')}}" class="btn btn-sm btn-primary pull-right">
						Crear
					</a>
					@endif
				</div>
		

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover" data-form="Form">
							<thead>
								<tr>
									<!--<th width="10px"> ID</th>-->
									<th> ID</th>
									<th> Descripciòn</th>
									<th colspan="3">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($comes as $come)
									<tr>
										<td>{{ $come->id }}</td>
										<td>{{ $come->description }}</td>
										<td width="10px">
											<a href="{{ route('comes.show', $come->id) }}" class="btn btn-sm btn-default">
												Ver
											</a>
										</td>
										@if(Auth::user()->userType !== 'READONLY')
										<td width="10px">
											<a href="{{ route('comes.edit', $come->id) }}" class="btn btn-sm btn-default">
												Editar
											</a>
										</td>
										<td width="10px">
											{!! Form::model($come, ['method' => 'delete', 'route' => ['comes.destroy', $come->id], 'class' =>'form-inline form-delete']) !!}
											{!! Form::hidden('id', $come->id) !!}
											{!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger delete', 'name' => 'delete_modal']) !!}
											{!! Form::close() !!}
										</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
					{{ $comes->render() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')

	<script src="{{ asset('js/resources/confirm-delete-general.js') }}"></script>

	<script type="text/javascript">
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350) 
	</script>
@endsection