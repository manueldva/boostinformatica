@extends('layouts.report')


@section('cuerpo')
<h3><center>Listado de Trabajos Realizados</h3>

<div class="portlet-body">
	<table id="clientes" class="table table-striped table-bordered table-advance table-hover table-responsive tablesorter">
											
		<thead>
			<tr>
	            <th>
					<center>
						<i></i>  Codigo
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
				<th>
					<center>
						<i></i> Reparado
					</center>
				</th>
				<th>
					<center>
						<i></i> Costo
					</center>
				</th>
				
				<th>
					<center>
						<i></i> P. Trabajo
					</center>
				</th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($deliveries as $delivery){ ?>
                 
                <tr>
                    <td class="col-md-4"><center>
                    <?php 
						if (isset($delivery->reception_id )) {
							echo $delivery->reception_id;
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
					<td class="col-md-4"><center>
                    <?php 
						if (isset($delivery->repaired )) {
							echo $delivery->repaired;
						} 
					?></center>
					</td>
					<td class="col-md-4"><center>
                    <?php 
						if (isset($delivery->cost )) {
							echo $delivery->cost;
						} 
					?></center>
					</td>
					<td class="col-md-4"><center>
                    <?php 
						if (isset($delivery->workPrice )) {
							echo $delivery->workPrice;
						} 
					?></center>
					</td>
                 </tr>
                    
            <?php  } ?>
		</tbody>
	</table>				
</div>
@stop

