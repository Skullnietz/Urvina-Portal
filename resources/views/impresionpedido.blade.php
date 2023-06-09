<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USI | {{__('Impresion del pedido generado')}}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="js/bootstrap.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style media="print">
    .zona_impresion{


    padding:10px 75px 10px 5px;

    float:left;
    margin-left:00px;
    border-style: solid;
    border:1px solid  #999;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);

    }
     #btnimprimir {
        display:none;
     }
     div.saltopagina{
      display:block;
      page-break-before:always;
   }
</style>


<body>
    <div class="container zona_impresion">
        <div  class="row">
            <div class="col-3">
                <div class="" style="width:280px; height:130px; margin-left:-30px" >
                    <img src="/logo/grupo_urvina_logo.png" style="width:280px; padding:10px; margin-right:30px " alt="">
                </div>

            </div>
            <div class="col-6">
                <div class="border rounded" style="width:500px; height:130px"><br>
                    <table style="width:500px;" >
                        <tr style="height:20px;" >
                            <td class=" border-top border-bottom">&nbsp;&nbsp;&nbsp;<b>{{__('Planta')}}</b> </td>
                            <td class="border-right border-top border-bottom">&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td class="border-top border-bottom">&nbsp;{{$_SESSION['usuario']->Planta}}&nbsp;&nbsp;</td>
                        </tr>
                        <tr style="height:20px;">
                            <td class=" border-top border-bottom">&nbsp;&nbsp;&nbsp;<b>{{__('Contacto')}}</b> </td>
                            <td class="border-right"  class="border-top border-bottom">&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td class="border-top border-bottom">&nbsp;{{$_SESSION['usuario']->AyudaNombre}}&nbsp;&nbsp;</td>
                        </tr>
                        <tr style="height:20px;">
                            <td class=" border-top border-bottom">&nbsp;&nbsp;&nbsp;<b>{{__('Referencia')}}</b> </td>
                            <td class="border-right border-top border-bottom">&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                            <td class="border-top border-bottom">&nbsp;{{$data[0]->Departamento}}&nbsp;&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-3" style="width:280px; height:200px; margin-top:-24px"><br>
                <div class="border-top border-right border-bottom rounded" style="padding:10px; text-align:center">
                    <label style="width:230px;height:22px;margin-left:-15px"for=""><b>{{__('Pedido No.')}}</b> </label><br>
                    <label style="height:22px; font-size:22px; color:blue"for=""><b>{{$data[0]->Pedido}}</b> </label><br><br>
                    <small style="height:22px;">{{$data[0]->CFecha->format('j F Y')}}</small><br>
                </div>
            </div>
        </div>
        <br>
        <div class="row" style="margin-left:10px">
            <div class="col-2 border rounded" style="text-align:center"><b> {{__('Artículo')}} </b></div>
            <div class="col-2 border rounded" style="text-align:center"><b> {{__('Código')}} </b></div>
            <div class="col-7 border rounded" style="text-align:center"><b> {{__('Descripción')}} </b></div>
            <div class="col-1 border rounded" style="text-align:left;"><b style="margin-left:-5px"> {{__('Cantidad')}} </b></div>
        </div>
        <!-- Articulo -->
        <br>
        @foreach ($data as $pedido)
        <div class="row" style="margin-left:10px">
            <div class="col-2 border rounded" style="text-align:center">{{$pedido->Articulo}}</div>
            <div class="col-2 border rounded" style="text-align:center">{{$pedido->Codigo}}</div>
            <div class="col-7 border rounded" style="text-align:center">{{$pedido->Descripcion}}[{{$pedido->Opcion}}]</div>
            <div class="col-1 border rounded" style="text-align:center">{{number_format($pedido->Cantidad)}}</div>
        </div>
        @endforeach

        <!-- Importe, Impuesto, Total, Moneda -->
        <br>
        <div class="row" style="margin-left:10px">
            <div class="col-2 border rounded" style="text-align:right"><b></b></div>
            <div class="col-3 border rounded" style="text-align:right"><b>{{__('Importe:')}} $34.16</b></div>
            <div class="col-3 border rounded" style="text-align:right"><b>{{__('Impuesto:')}} $5.47</b></div>
            <div class="col-3 border rounded" style="text-align:right"><b>{{__('Total:')}} $39.63</b></div>
            <div class="col-1 border rounded" style="text-align:center"><b>{{__($data[0]->articulo[0]->Moneda)}}</b></div>
        </div>
        <!-- Observaciones -->
        <br>
        <div class="row">
            <div class="col-2" style="text-align:right"> {{__('Observaciones:')}} </div>
            <div class="col-10 border rounded">{{$pedido->Observaciones}}</div>
        </div>
        <br>
        <br>
    </div>
    <div class="saltopagina"></div>
    <br><br>
    <center>
        <button id="btnimprimir" onclick="printHTML()" class="btn btn-success"> {{__('Imprimir')}} </button>
    </center>


</body>
<script>
    function printHTML() {
  if (window.print) {
    window.print();
  }
}
document.addEventListener("DOMContentLoaded", function(event) {
  printHTML();
});
  </script>

</html>
