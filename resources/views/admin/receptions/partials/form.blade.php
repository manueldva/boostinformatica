
@if(!isset($reception))
	<div class="form-group col-md-12">
		{{ form::label('codmanual', 'Codigo Manual:') }}
		<label>
			{{ Form::checkbox('codmanual','1')}} 

		</label>
		{{ form::number('codigo', null, ['class' => 'form-control', 'id' => 'codigo', 'min' => '1']) }}
	</div>
@endif

<div class="form-group col-md-12">
	{{ form::label('client_id', 'Cliente:') }}

	{{ form::select('client_id', $clients, null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...', 'id' => 'client_id' ] ) }}

</div>

<div class="form-group  col-md-6">
	{{ form::label('equipment_id', 'Equipo:') }}
	{{ form::select('equipment_id', $equipments, null, ['class' => 'form-control','placeholder' => 'Seleccionar...'] ) }}
</div>
<div class="form-group  col-md-6">
	{{ form::label('model', 'Modelo (Opcional):') }}
	{{ form::text('model', null, ['class' => 'form-control', 'id' => 'model']) }}
</div>
<div class="form-group  col-md-6">
	{{ form::label('keycode', 'Clave (Opcional):') }}
	{{ form::text('keycode', null, ['class' => 'form-control', 'id' => 'keycode']) }}
</div>
<div class="form-group col-md-6">
	{{ form::label('ignition', '¿Encendió?') }}
	<br>
	<label>
		{{ Form::radio('ignition','NOT')}} No
	</label>
	<label>
		{{ Form::radio('ignition','YES')}} Si
	</label>
</div>
<!--
<div class="form-group">
	{{ form::label('imei', 'Numero de IMEI (Opcional):') }}
	{{ form::text('imei', null, ['class' => 'form-control', 'id' => 'imei']) }}
</div>
-->
<div class="form-group col-md-12">
	{{ form::label('description', 'Descripcion:') }}
	{{ form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('image', 'Imagen (Opcional):') }}
    {{ Form::file('image') }}
</div>

<div class="form-group col-md-12">
	{{ form::label('reason_id', 'Razón:') }}
	{{ form::select('reason_id', $reasons, null, ['class' => 'form-control','placeholder' => 'Seleccionar...'] ) }}
</div>

<div class="form-group col-md-12">
	{{ form::label('concept', 'Falla:') }}
	{{ form::textarea('concept', null, ['class' => 'form-control']) }}
</div>
<div class="form-group col-md-12">
	<div class="form-group">
		{{ form::label('drums', 'Bateria/Cargador: ') }}
		<label>
			{{ Form::radio('drums','NOT')}} No
		</label>
		<label>
			{{ Form::radio('drums','YES')}} Si
		</label>
	</div>
</div>

<div class="form-group  col-md-6">
	{{ form::label('battery', 'Bateria (Opcional):') }}
	{{ form::text('battery', null, ['class' => 'form-control', 'id' => 'battery']) }}
</div>
<div class="form-group  col-md-6">
	{{ form::label('charge', 'Cargador (Opcional):') }}
	{{ form::text('charge', null, ['class' => 'form-control', 'id' => 'charge']) }}
</div>


<div class="form-group col-md-12">
	{{ form::label('budget', 'Presupuesto (Opcional):') }}
	{{ form::number('budget', null, ['class' => 'form-control', 'id' => 'budget', 'step' => '0.01']) }}
</div>

<div class="form-group col-md-12">
	{{ form::label('come_id', 'Publicidad:') }}
	{{ form::select('come_id', $comes, null, ['class' => 'form-control','placeholder' => 'Seleccionar...'] ) }}
</div>


@if (isset($reception))
	@if($reception->status !== 'PROCESS' && $reception->status !== 'REPAIRING')
		<div class="form-group col-md-12">
			{{ form::label('status', 'Estado:') }}
			<label>
				{{ Form::radio('status','RECEIVED')}} Recibido
			</label>
			<label>
				{{ Form::radio('status','PROCESS')}} Aprobada
			</label>
		</div>
	@endif
@else
	<div class="form-group col-md-12">
		{{ form::label('status', 'Estado:') }}
		<label>
			{{ Form::radio('status','RECEIVED')}} Recibido
		</label>
		<label>
			{{ Form::radio('status','PROCESS')}} Aprobada
		</label>
	</div>
@endif


<div class="form-group col-md-12">
	<button type="submit" class="btn btn-sm btn-primary"> Guardar</button>
</div>

@section('js')
<script src="{{ asset('js/resources/select2.js') }}"></script>
@endsection

@section('scripts')
	<script type="text/javascript">

		$('div.alert').not('.alert-important').delay(3000).fadeOut(350) 
		function codigoValidacion(){ 
			if( $('#codmanual').is(':checked') ){
		        // Hacer algo si el checkbox ha sido seleccionado
		        $('#codigo').removeAttr('disabled');
		    } else {
		        // Hacer algo si el checkbox ha sido deseleccionado
		      	$('#codigo').attr('disabled','disabled');
		      	$('#codigo').val('');
		    }
		}

		codigoValidacion();
		
		$('#client_id').select2();
		$('#equipment_id').select2();
		$('#reason_id').select2();
		

		/*if($('input[name=codmanual]:checkbox:checked').val() == '1')
		{
			$('#input').attr('disabled','disabled');
		} else{
			$('#input').removeAttr('disabled');
		}*/

		$('#codmanual').on( 'click', function() {
		    codigoValidacion();
		});


	</script>
@endsection