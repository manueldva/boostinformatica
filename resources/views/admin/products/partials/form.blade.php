<div class="form-group">
	{{ form::label('producttype_id', 'Tipo de Producto:') }}

	{{ form::select('producttype_id', $producttypes, null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...'] ) }}
</div>

<div class="form-group">
	{{ form::label('description', 'Descripcion:') }}
	{{ form::text('description', null, ['class' => 'form-control']) }}

</div>

<div class="form-group">
	{{ form::label('price', 'Precio:') }}
	{{ form::number('price', null, ['class' => 'form-control', 'id' => 'price', 'step' => '0.01']) }}
</div>

<div class="form-group">
	{{ form::label('stock', 'Stock:') }}
	{{ form::number('stock', null, ['class' => 'form-control', 'id' => 'stock']) }}
</div>

<div class="form-group">
	<button type="submit" class="btn btn-sm btn-primary"> Guardar</button>
</div>


@section('scripts')
	<script type="text/javascript">
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350) 
	</script>
@endsection