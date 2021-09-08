@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Informe Cliente/Publicidad</strong>
                </div>
        
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                <div class="row col-md-12">
                    <div class="form-group pull-right">
                        <a href="{{ route('reports.index') }}" type="button" class="btn btn btn-default">
                            <span class="fa fa-list">
                            </span>
                                Listado
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {!! Form::open() !!}
                    <div class="form-group">
                        <div class="table-responsive" >
                            <table class="table table-striped table-hover tablesorter">
                                <thead>
                                <td>
                                    {{ form::label('fechadesde', 'Fecha Desde*') }}
                                    {{ form::date('fechadesde', \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'fechadesde']) }}
                                </td>
                                <td>
                                    &nbsp;&nbsp;
                                </td>
                                <td>
                                    {{ form::label('fechahasta', 'Fecha Hasta*') }}
                                    {{ form::date('fechahasta', \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'fechahasta']) }}
                                </td>
                                </thead>
                            </table>
                        </div>    
                    </div>
                    <!--

                    <div class="form-group">
                        {{ form::label('usuario', 'Vendedor *') }}
                        {{ form::select('usuario', [],  null, ['class' => 'form-control','placeholder' => 'Seleccionar'] ) }}
                    </div>
                    -->

                    <br>
                    <!--<a  type="submit"  class="btn btn btn-primary" target="_blank">
                        Generar Informe
                    </a>-->
                    
                
                    <a target="_blank" href="#" id="imprimir"> 
                        <button  type="button" class="btn btn btn-primary">  Generar Informe</button>
                    </a>
                {!! Form::close() !!}

            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
   <script type="text/javascript">

        $('#imprimir').on('click', function(e){
            
           
            var fechadesde = $("#fechadesde").val();
            var fechahasta = $("#fechahasta").val();
            e.preventDefault();
            window.open("{{url('informeclientepublicidadprint')}}/" + fechadesde + "/" + fechahasta);


        });

        
    </script>
@endsection



