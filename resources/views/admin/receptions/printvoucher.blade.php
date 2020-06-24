@extends('layouts.report')

@section('customstyle')

<style>
table {
    width: 20%;
	height: 100px;
}
</style>
<!-- END PAGE LEVEL STYLES -->
@stop
<?php
/*highlight_string(var_export($cajachicas, true));
exit();*/
?>
@section('cuerpo')
  <h3></h3>
  
  <table class="collapse"> <!--width="600"-->
    <thead>
      <tr>
        <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <center> 
         <!--Alta Complejidad <br>-->
         @if($empresa->file)
              <img src="{{ $empresa->file }}" height="120" width="120" ><br>
         @elseif(isset($empresa->nombre))
          <strong>Empresa<br>
          "{{$empresa->nombre}}" <br>
         @else
            <strong>Empresa<br>
            "Nombre Empresa"<br>
         @endif
        
          <br>
        <!-- <strong>I.V.A. EXENTO</strong>-->
       </center></td>

        <td><center><font size=10>x</font><br></center></td>

        <td><center>&nbsp;&nbsp;&nbsp;</center></td>

        <td><strong>N° 0002 - {{$reception->id}}<br>
        FECHA: {{$reception->description}}<br>
        <!-- CUIT. N°:  {{ isset($empresa->cuit) ? $empresa->cuit : "-"}} <br>
        ING. BRUTOS:  {{ isset($empresa->ingresosbrutos) ? $empresa->ingresosbrutos :  "-" }} <br>
        INICIO DE ACTIVIDADES:{{ isset($empresa->inicioactividades) ? $empresa->inicioactividades :  "-" }}--> </strong></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="4">Señor/es: <strong>{{ $reception->client->name }} </strong></td>
      </tr>
      <tr>
        <td colspan="4">Domicilio: <strong>{{ $reception->client->address }}</strong></td>
      </tr>
      <tr>
        <td colspan="2">Nro Telefono: <strong>{{ $reception->client->phone }}</strong></td>
        <td colspan="2">Nro Celular: <strong>{{ $reception->client->cellPhone }}</strong></td>
      </tr>
      <tr>
      	<td colspan="4">
	        <table class="collapse">
			    <thead>
			      <tr>
			       <!-- <td><strong>Numero de IMEI: {{ $reception->imei }}</strong></td>-->
			      </tr>
			    </thead>
			</table>
		</td>
      </tr>
      <tr>
        <td colspan="2">Recibi (mos) un (a): <strong>  {{ $reception->equipment->description }} </strong></td>
        <td colspan="2">Modelo: <strong>  {{ $reception->model }} </strong></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
       <tr>
        <td colspan="2">Bateria: <strong>  {{ $reception->battery }} </strong></td>
        <td colspan="2">Cargador: <strong>  {{ $reception->charge }} </strong></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">Falla: <strong>{{ $reception->concept }} </strong></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
         <td colspan="4">Presupuesto $: {{ $reception->budget }}<strong></strong></td>
      </tr>
      <!--
      <tr>
        <td colspan="4"> &nbsp;<strong>  </strong></td>
      </tr>
      -->
      <tr>
      	<td colspan="2">
        <table class="collapse">
			    <thead>
			      <tr>
			        <td>
              <H4><strong>Sucursal: {{ isset($empresa->direccion) ? $empresa->direccion : "-"}}</strong></H4>
			        <H4><strong>Telefono: {{ isset($empresa->phone) ? $empresa->phone : "-"}}</strong></H4>
              <H4><strong>WhatsApp: {{ isset($empresa->cellPhone) ? $empresa->cellPhone : "-"}}</strong></H4>
             
			      	</td>
			      </tr>
			    </thead>
			</table>
         </td>
      	<td colspan="2">
	        <table class="collapse">
			    <thead>
			      <tr>
			        <td><H3><strong>FIRMA:</strong></H3><br>
			        <H3><strong>ACLARACION:</strong></H3>
			      	</td>
			      </tr>
			    </thead>
			</table>
		</td>
      </tr>
    </tbody>   
  </table>
  <center><h5><strong>Garantia {{ isset($empresa->warranty) ? $empresa->warranty : "-"}} dias</strong></h5></center>
  <h6><strong>{{ isset($empresa->observations) ? $empresa->observations : ""}}</strong></h6>
@stop
