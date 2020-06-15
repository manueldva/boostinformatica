@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Informe </strong>
					
					
				</div>
		
				<div class="panel-body">
					{!! Form::open(['route' => 'deliveries.store']) !!}
					
					<div class="form-group col-md-3">

						{{ form::label('year', 'Año:') }}

						{{ form::select('year', $years, $year, ['class' => 'form-control'] ) }}
					</div>


					<div class="form-group col-md-3">

						{{ form::label('month', 'Meses:') }}

						{{ form::select('month', $months, null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...'] ) }}
					</div>

					<div class="form-group col-md-3">
						{{ form::label('cost', 'Costo Total Mes:') }}
						{{ form::number('cost', null, ['class' => 'form-control', 'id' => 'cost', 'readonly' => 'readonly']) }}
					</div>
					<div class="form-group col-md-3">
						{{ form::label('vent', 'Venta Total Mes:') }}
						{{ form::number('vent', null, ['class' => 'form-control', 'id' => 'vent', 'readonly' => 'readonly']) }}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')
	<script type="text/javascript">
		


		$('#month').change(function() {
			
			

			month = $('#month').val();

			year = $('#year').val();

			if(month == '') {
				$('#vent').val('');

				$('#cost').val('');
			} else{

				var APP_URL = "{{ url('/') }}";

				$.ajax({
		        url: APP_URL + '/deliveryreport/' + year + '/' + month,
		        
		        //url: "/habilitarmodulos/" + user
		        }).done(function(resultado) {
		            console.log(resultado);
		            
		            $('#cost').val( resultado["0"]["cost"]);
		            
		            $('#vent').val( resultado["0"]["workPrice"]);

		            //alert(resultado["0"]["cost"]);

		       
		        });
	        }
		});


		$('#year').change(function() {
			
			
			$('#month').val('');
			
			$('#vent').val('');

			$('#cost').val('');

		});

	</script>
@endsection
