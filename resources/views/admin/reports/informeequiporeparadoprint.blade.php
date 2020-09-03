@extends('layouts.report')


@section('cuerpo')
<h3><center>Listado de Reparaciones</h3>

<div class="portlet-body">
	<table id="clientes" class="table table-striped table-bordered table-advance table-hover table-responsive tablesorter">
											
		<thead>
			<tr>
	            <th>
					<center>
						<i></i>  Nro Cliente
					</center>	
				</th>
				<th>
					<center>
						<i></i> Cliente
					</center>	
				</th>
				<th>
					<center>
						<i></i> Fecha Entrega
					</center>
				</th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($deliveries as $delivery){ ?>
                 
                <tr>
                    <td class="col-md-4"><center>
                    <?php 
						if (isset($delivery->client_id )) {
							echo $delivery->client_id;
						} 
					?></center>
					</td>	
                    <td class="col-md-4"><center>
                    <?php 
						if (isset($delivery->name )) {
							echo $delivery->name;
						} 
					?></center>
					</td>
					<td class="col-md-4"><center>
                    <?php 
						if (isset($delivery->deliverdate )) {
							echo $delivery->deliverdate;
						} 
					?></center>
					</td>
                 </tr>
                    
            <?php  } ?>
		</tbody>
	</table>				
</div>
@stop

