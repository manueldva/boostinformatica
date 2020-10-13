<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garantia</title>
    <style>
            @page {
                margin: 0cm 0cm;
            }
            /** Define now the real margins of every page in the PDF **/
            
            .pagenum:before {
                content: counter(page);
            }
            /*.etiqueta_copia:before {
                content: 'Original';
            }*/
            
           
            
            body {
                margin-top: 7cm;
                margin-left: 0.5cm;
                margin-right: 0.5cm;
                margin-bottom: 3.5cm;
            }
            
            table {
                width: 100%;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
            }
            /** Define the header rules **/
            
            header {
                position: fixed;
                top: 0.5cm;
                left: 0.5cm;
                right: 0.5cm;
                height: 5.5cm;
                /** Extra personal styles **/
                /*background-color: #03a9f4;
                    color: white;
                    text-align: center;*/
                /*line-height: 1.5cm;*/
            }
            /** Define the footer rules **/
            
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0.5cm;
                right: 0.5cm;
                height: 3.5cm;
                /** Extra personal styles **/
                
                
                font-size: 12px;
                /*color: white;*/
                /*text-align: center;
                line-height: 1.5cm;*/
            }
            .cai{
                background-color: lightgrey;
                border: 1.2px solid black;
                border-collapse: collapse;
                font-weight: normal;
            }
            .cai>thead>tr>th{
                font-size: 12px;
                font-weight: normal;
            }
            
            .brand {
                height: 50px;
                border: 1.2px solid black;
                border-collapse: collapse;
            }
            
            .letra {
                border: 1.2px solid black;
                border-collapse: collapse;
                font-size: 40px;
                vertical-align: middle;
                text-align: center;
            }
            .original-duplicado {
                text-align: right;
                font-size: 12px;
                
            }
            
            .company {
                font-size: 25px;
                padding-top: 25px;
            }
            
            .brand-st-left {
                text-align: right;
                padding-right: 5px;
            }
            
            .nro_remito {
                font-weight: normal;
                text-align: left
            }
            
            .barras {
                font-weight: normal;
                text-align: left;
                font-size: 11px;
                vertical-align: bottom;
            }
            
            .brand-st-rigth {
                padding-left: 5px;
            }
            
            p {
                padding: 0px, 0px, 0px, 0px;
                font-size: 11px
            }
            
            .pagina {
                font-size: 12px;
                text-align: right;
                padding-right: 5px;
                padding-bottom: 5px;
                vertical-align: bottom;
            }
            
            
            
            .entrega>thead>tr>th {
                padding-left: 5px;
            }
            
            .entrega>thead>tr {
                text-align: left;
                font-size: 14px;
            }
            
            .entrega .atributo {
                font-weight: normal;
                font-size: 12px;
            }
            
           
            
            .entrega .divisor-vertical {
                border-right: 1.2px solid black;
                border-collapse: collapse;
            }
            
            .observaciones {
                height: 10mm;
                border-bottom: 1.2px solid black;
            }
            
            .item-head,
            .item-head>td {
                background-color: lightgrey;
                font-size: 12px;
                font-weight: bold;
            }
           
            
            .articulos>tbody>tr>td {
                font-size: 12px;
            }
            .cantidad{
                font-size: 1.9rem;
                text-align: right;
            }
          
             .articulos>.footer{
                background-color: lightgrey;
                border-top: 1.2px solid gray;
                color: black;
                font-size: 0.9rem;
                padding-top: 15px;
                font-weight: bolder;
            } 
            
            .entrega>thead>tr {
                text-align: left;
                font-size: 12px;
            }
            
            .entrega .atributo {
                font-weight: normal;
                font-size: 12px;
            }
            
            .entrega {
                border-bottom: 1.2px solid black;
                border-collapse: collapse;
                
                
                line-height: 1.2rem;
                height: 2cm;
            }
            
            .entrega .divisor-vertical {
                border-right: 1.2px solid black;
                border-collapse: collapse;
            }
            .firma {
                padding-top: 2cm;
            }
            .observaciones-texto{
                font-size: 13px;
                font-weight: bold;
                padding: 5px;
                text-align: left;
                vertical-align: top
            }
        </style>
</head>

<body>
    <header>
        <table class="brand">
            <thead>
                <tr>
                    <th style="width: 47%" class="brand-st-left">
                        <strong class="company">
                            @if(isset($empresa->nombre))
                                {{$empresa->nombre}} 
                            @else
                                "Nombre Empresa"
                            @endif 
                        </strong>
                    </th>
                    <th class="letra" rowspan="2" style="width: 6%">
                       
                    </th>
                    <th style="width: 18%;text-align: left" class="brand-st-rigth">
                        <strong>Recibo Garantia:</strong> 
                        <br>
                        <br>
                        <strong>Fecha:</strong>
                    </th>
                    <th style="width: 17%" class="nro_remito">
                            0001 - {{ $delivery->reception->id }}
                            <br> 
                            <br> 
                           {{ $delivery->deliverDate }} 
                    </th>
                    <th style="width: 12%" class="barras">
                        <br> <p class="etiqueta_copia"></p> 
                    </th>
                </tr>
                <tr>
                    <td colspan="1" class="brand-st-left">
                        @if(isset($empresa->direccion))
                            {{$empresa->direccion}}
                        @else
                            S/D
                        @endif
                    </td>
                    <td colspan="2" class="brand-st-rigth">
                        
                    </td>
                    <td class="pagina"> <span lass="pagenum"></span></td>

                </tr>

            </thead>

        </table>

        <table style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="width: 10%"></th>
                    <th style="width: 40%" class="atributo divisor-vertical"></th>
                    <th style="width: 10%"></th>
                    <th style="width: 40%" class="atributo">
                    </th>

                </tr>
                <tr>
                    <th style="width: 10%">Cliente</th>
                    <th class="atributo divisor-vertical" style="width: 40%">
                        {{ $delivery->reception->client->name }}
                    </th>
                    <th style="width:10%">Equipo:</th>
                    <th style="width: 40%" class="atributo">{{ $delivery->reception->equipment->description }}</th>


                </tr>
                <tr>
                    <th style="width: 10%">Nro Orden</th>
                    <th style="width: 40%" class="atributo divisor-vertical">{{$delivery->reception->id}} </th>
                    <th style="width: 10%">C. Venta :</th>
                    <th style="width: 40%" class="atributo">
                       fulanito
                    </th>

                </tr>
                <tr>
                    <br>
                    <hr>
                </tr>
            </thead>

        </table>

        <main>
        <br>
       
        <table class="articulos" id="tabla1" name="tabla1">

            <thead class="item-head">
                <tr>
                    <td style="width: 10%">
                        Cod.
                    </td>
                    <td style="width: 35%">
                        Descripción
                    </td>
                    <td style="width: 15%">
                        Cantidad
                    </td>
                    <td style="width: 10%">
                        Precio
                    </td>
                    <td style="width: 10%">
                        Total
                    </td>
                </tr>
            </thead>
            <tbody>
        
                <tr>
                    <td>
                        {{$delivery->reception->id }}
                    </td>
                    <td>
                       {{$delivery->reception->reason->description}}
                    </td>
                    <td>
                       1
                    </td>
                    <td>
                       
                    </td>
                    <td>
                        {{ $delivery->workPrice }}
                    </td>
                </tr>
               

            </tbody>
            
        </table>
        
        
    </main>

       
    </header>

    <footer>
        <table class="cai">
            <thead>
                <tr>
                    <th style="width: 33%">
                        {{ $empresa->observations }}
                    </th>
                    
                </tr>
            </thead>
    
        </table>
        <br>
         <table>
            <thead>
                <tr>
                    <th style="width: 33%">
                        Retira conforme. Acepta términos de la garantía escrita.
                    </th>
                    
                    <th style="width: 33%">
                        Subtotal  {{ $delivery->workPrice }}
                    </th>
                </tr>
                 <tr>
                    <th style="width: 33%">
                        
                       <br>
                        ...........................
                        <br>
                        Firma y aclaración

                    </th>

                    <th style="width: 33%">
                       
                    </th>
                </tr>
            </thead>
    
        </table>
      
    </footer>

    

    
</body>

</html>
