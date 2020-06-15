@if($empresa->file)
    <div class="form-group">
		<p> <strong>Imagen:</strong></p>
        <img src="{{ $empresa->file }}" height="200" width="300" >
	</div>
@endif

<div class="form-group">
	{{ Form::file('image') }}
</div>


<div class="form-group">
	{{ form::label('nombre', 'Nombre:') }}
	{{ form::text('nombre', null, ['class' => 'form-control']) }}

</div>

<div class="form-group">
	{{ form::label('direccion', 'Dirección:') }}
	{{ form::text('direccion', null, ['class' => 'form-control']) }}

</div>


<div class="form-group">
	{{ form::label('cuit', 'Cuit:') }}
	{{ form::text('cuit', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form::label('ingresosbrutos', 'Ingresos Brutos:') }}
	{{ form::text('ingresosbrutos', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form::label('inicioactividades', 'Inicio de Actividades:') }}
	{{ form::date('inicioactividades', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form::label('cellPhone', 'Nro Celular (opcional):') }}
	{{ form::number('cellPhone', null, ['class' => 'form-control', 'id' => 'cellPhone']) }}
</div>
<div class="form-group">
	{{ form::label('phone', 'Nro Telefono (opcional):') }}
	{{ form::number('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
</div>

<div class="form-group">
	{{ form::label('warranty', 'Dias de Garantia (opcional):') }}
	{{ form::number('warranty', null, ['class' => 'form-control', 'id' => 'warranty']) }}
</div>

<div class="form-group">
	{{ form::label('observations', 'Observaciones:') }}
	{{ form::textarea('observations', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
	<button type="submit" class="btn btn-sm btn-primary"> Guardar</button>
</div>



@section('scripts')
	<script type="text/javascript">

		$('div.alert').not('.alert-important').delay(3000).fadeOut(350) 


	</script>
@endsection