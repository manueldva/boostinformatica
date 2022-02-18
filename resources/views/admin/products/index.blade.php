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
					<strong>Lista de Productos</strong> 
					
					<form class="navbar-form navbar-right" role="search">
						
						{{ Form::model(Request::only('producttype_id', 'val'), array('route' => 'products.index', 'method' => 'GET'), array('role' => 'form', 'class' => 'navbar-form pull-right')) }}
						<div class="form-group">
							{{ form::label('buscar', 'Tipo Busqueda:') }}
							<!--{{ form::select('type', config('options.products'), null, ['class' => 'form-control', 'id' => 'type'] ) }}-->
							{{ form::select('producttype_id', $producttypes, null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...','id' => 'producttype_id'] ) }}
							{{ form::text('val', null, ['class' => 'form-control', 'id' => 'val']) }}
							
							<button type="submit" class="btn btn-sm btn-success"> Buscar</button>
							@if(Auth::user()->userType !== 'READONLY')
							<a href="{{ route('products.create')}}" class="btn btn-sm btn-primary">
								 Crear
							</a>	
							@endif
						</div>
						
						{{ Form::close() }}
					</form>
				<br>
				<br>	
					
				</div>

				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-striped table-hover" data-form="Form">
							<thead>
								<tr>
									<!--<th width="10px"> ID</th>-->
									<th> Codigo</th>
									<th> Descripcion</th>
									<th> Tipo Producto</th>
									<th> Precio</th>
									<th colspan="3">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($products as $product)
									<tr>
										<td>{{ $product->id }}</td>
										<td>{{ $product->description }}</td>
										<td>{{ $product->producttype->description ?? '-' }}</td>
										<td>{{ $product->price ?? '-' }}</td>
										<td width="10px">
											<a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-default">
												Ver
											</a>
										</td>
									
										<td width="10px">
											<a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-default">
												Editar
											</a>
										</td>
										<td width="10px">
											{!! Form::model($product, ['method' => 'delete', 'route' => ['products.destroy', $product->id], 'class' =>'form-inline form-delete']) !!}
											{!! Form::hidden('id', $product->id) !!}
											{!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger delete', 'name' => 'delete_modal']) !!}
											{!! Form::close() !!}
										</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
					{{ $products->appends(Request::only(['producttype_id', 'val']))->render() }}
				</div>

			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')

	
	<script src="{{ asset('js/resources/confirm-delete-general.js') }}"></script>

	<script type="text/javascript">

		
		/*function searchType(){ 
		   var type = $('#producttype_id').val();
			if (type == 'description'){
				producttype_id
				$('#val').attr('type','text');
				$('#val').focus();
			} else
			{
				$('#val').attr('type','text');
				$('#val').focus();
			}
		}

		searchType(); 
		*/

		$('#producttype_id').change(function(e) {
			//searchType(); 
			$('#val').val('');
			$('#val').focus();
		});

		/*function searchType(){ 
		   var type = $('#type').val();
			if (type == 'date'){
				$('#val').attr('type','date');
				$('#val').val('');
				$('#val').focus();
			} else if (type == 'id')
			{
				$('#val').attr('type','number');
				$('#val').val('');
				$('#val').focus();
			} else
			{
				$('#val').attr('type','text');
				$('#val').val('');
				$('#val').focus();
			}
		}

		searchType(); 
		

		$('#type').change(function(e) {
			searchType(); 
		});*/

		$('div.alert').not('.alert-important').delay(3000).fadeOut(350) 
	</script>
@endsection