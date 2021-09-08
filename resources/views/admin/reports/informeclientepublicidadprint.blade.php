@extends('layouts.report')


@section('cuerpo')
<h3><center>Listado de Clientes Ingresantes por Publicidad</h3>

<div class="portlet-body">
	<table id="clientes" class="table table-striped table-bordered table-advance table-hover table-responsive tablesorter">
											
		<thead>
			<tr>
	            <th>
					<center>
						<i></i>  Publicidad
					</center>	
				</th>
				<th>
					<center>
						<i></i> Cantidad
					</center>	
				</th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($publicidades as $publicidad){ ?>
                 
                <tr>
                    <td class="col-md-4"><center>
                    <?php 
						if (isset($publicidad->description )) {
							echo $publicidad->description;
						} 
					?></center>
					</td>	
                    <td class="col-md-4"><center>
                    <?php 
						if (isset($publicidad->cantidad )) {
							echo $publicidad->cantidad;
						} 
					?></center>
					</td>
                 </tr>
                    
            <?php  } ?>
		</tbody>
	</table>				
</div>
@stop

