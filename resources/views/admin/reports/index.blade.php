@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Informes</strong>
                </div>
        
                <div class="panel-body">
                    <div class="row">

            <div class="col-md-6">
                <br>
                <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 1) }}" style="color:#235B88;">
                        Inf. Trabajos Realizados 
                    </a>
                </div>
                <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 2) }}" style="color:#235B88;">
                        Inf. Clientes/Publicidad
                    </a>
                </div>
                <!--
                <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 3) }}" style="color:#235B88;">
                        Informes vendedores Stock
                    </a>
                </div> 
               
                <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 2) }}" style="color:#235B88;">
                        Informes ventas en oficina
                    </a>
                </div> 
                -->

            </div>

            <div class="col-md-6">
                <br>
                    <!--
                 <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 4) }}" style="color:#235B88;">
                        Informe Clientes Sin Comprar por Mes
                    </a>
                </div> 
                <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 5) }}" style="color:#235B88;">
                        Informe Movimientos del Cliente
                    </a>
                </div>  
                <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 6) }}" style="color:#235B88;">
                        Informe Movimientos Cuenta Corriente del Cliente
                    </a>
                </div>  
                <div class="form-group" style="font-size:16pt">
                    <a href="{{ route('reports.show', 7) }}" style="color:#235B88;">
                        Informe Gastos
                    </a>
                </div>  
                -->
                
            </div>

        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

