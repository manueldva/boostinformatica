<div class="form-group">
	{{ form::label('reception_id', 'Codigo/Cliente Recepción:') }}

	{{ form::select('reception_id', $receptions, null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...'] ) }}
</div>

<div class="form-group">
	{{ form::label('deliverDate', 'Fecha Entrega:') }}
	{{ form::date('deliverDate', null, ['class' => 'form-control', 'id' => 'deliverDate', 'min' => '2000-01-01']) }}
</div>
<div class="form-group">
	{{ form::label('workDone', 'Trabajo Hecho:') }}
	{{ form::textarea('workDone', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<div class="form-group">
		{{ form::label('repaired', 'Equipo Reparado: ') }}
		<label>
			{{ Form::radio('repaired','YES')}} Si
		</label>
		<label>
			{{ Form::radio('repaired','NOT')}} No
		</label>
	</div>
</div>

<div class="form-group">
	{{ form::label('cost', 'Costo Reparación/Producto (Opcional):') }}
	{{ form::number('cost', null, ['class' => 'form-control', 'id' => 'cost', 'step' => '0.01']) }}
</div>

<div class="form-group">
	{{ form::label('observationCost', 'Observación Costo (Opcional):') }}
	{{ form::textarea('observationCost', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form::label('workPrice', 'Precio del Trabajo:') }}
	{{ form::number('workPrice', null, ['class' => 'form-control', 'id' => 'workPrice', 'step' => '0.01']) }}
</div>


<div class="form-group">
	<button type="submit" class="btn btn-sm btn-primary"> Guardar</button>
</div>


@section('scripts')
	<script type="text/javascript">
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350) 
	</script>
@endsection