@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
<style>
    a {
            color: inherit;
            /* blue colors for links too */
            text-decoration: inherit;
            /* no underline */
        }
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-credits {
display: none !important;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.tabla-seccion {
  max-width: 100%;
  overflow-x: auto;
}
.tabla-contenedor {
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; /* para mejorar el desplazamiento en iOS */
}
.tabla {
  width: 100%;
  border-collapse: collapse;
  white-space: nowrap; /* para evitar el ajuste automático de texto en celdas */
}
.tabla th,
.tabla td {
  padding: 0.5rem;
  border: 1px solid #ccc;
  text-align: left;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

#button-bar {
  min-width: 310px;
  max-width: 800px;
  margin: 0 auto;
}
</style>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1><a href="#" onclick="goBack()" class="border rounded" >&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;</a>&nbsp;&nbsp;&nbsp;{{__('Consultas del Cliente')}}</h1>
            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
@stop

@section('right-sidebar')
    <div class="container">
        <center>
            <br>
            <h3>{{__('Contacto')}}</h3>
            <br><br>
            <div class="card">

                <a href="">
                    <div class="card-body"><i class="fas fa-user"></i><br>
                        <b>{{ $_SESSION['usuario']->AyudaNombre }}</b>
                </a>
                <hr><br>
                <a href="tel:+52{{ $_SESSION['usuario']->Ayudatel }}" target="_blank">
                    <i class="fas fa-phone"></i><br>
                    <b>{{ $_SESSION['usuario']->Ayudatel }}</b>
                </a>
                <hr><br>

                <a href="mailto:{{ $_SESSION['usuario']->AyudaMail }}" target="_blank">
                    <i class="fas fa-envelope"></i><br>
                    <small>{{ $_SESSION['usuario']->AyudaMail }}</small>
                </a>
            </div>
    </div>
    </div>
    </center>


@stop

@section('content')
    <div class="container">
        <!-- Formulario de Reportes-->
        <div class="row" >
            <div class="col">
                <div class="card collapsed-card">

                    <div class="card-header bg-success">
                        <h5 class="card-title">{{__('Reportes')}}</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i style="color:white" class="fas fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i style="color:white" class="fas fa-times"></i>
                            </button>
                            </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('reporteC', app()->getLocale())}}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">

                                    <div class="card-header bg-secondary"><center><b>{{__('Tipo de Reporte')}}</b></center></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" name="tipo" value="Consumo"
                                                                aria-label="Radio button for following text input" required>
                                                        </div>
                                                    </div>
                                                    <b class="form-control">{{__('Consumo')}}</b>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input name="tipo" type="radio" value="Departamento"
                                                                aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <b class="form-control">{{__('Departamento')}}</b>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" name="tipo" value="Equipo"
                                                                aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <b class="form-control">{{__('Equipo')}}</b>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" name="tipo" value="Anual"
                                                                aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <b class="form-control">{{__('Anual')}}</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" name="tipo" value="Pedidos"
                                                                aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <b class="form-control">{{__('Pedidos')}}</b>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header bg-primary" data-card-widget="collapse"> <center><b>{{__('Información detallada (Opcional)')}}</b></center></div>
                                <div class="card-body">


                                    <ul class="nav nav-tabs">
                                        <li style="margin-right:10px ; margin-bottom:5px"><a class="btn btn-secondary checked" data-toggle="tab" href="#fecha">{{__('Fecha')}}</a></li>
                                        <li style="margin-right:10px ; margin-bottom:5px"><a class="btn btn-secondary checked" data-toggle="tab" href="#articulo">{{__('Articulo')}}</a></li>
                                        <li style="margin-right:10px ; margin-bottom:5px"><a class="btn btn-secondary checked" data-toggle="tab" href="#equipo">{{__('Equipo')}}</a></li>
                                        <li style="margin-right:10px ; margin-bottom:5px"><a class="btn btn-secondary checked" data-toggle="tab" href="#departamento">{{__('Departamento')}}</a></li>
                                    </ul>

                                      <div class="tab-content" style="margin-top:10px">

                                        <div id="fecha" class="tab-pane fade in active">
                                            <div class="row">
                                                <div class="col"><b>{{__('Selección rapida')}}</b> </div>
                                            </div>
                                            <div style="margin-bottom:10px;" class="row">
                                                <div class="col"><select  class="form-control" name="fechaRapida" id="selectFechaRapida">
                                                    <option value="Seleccion detallada">{{__('Selección detallada')}}</option>
                                                    <option value="semana">{{__('Semana')}}</option>
                                                    <option value="mes">{{__('Mes')}}</option>
                                                    <option value="anio">{{__('Año')}}</option>
                                                    <option value="enero">{{__('Enero')}}</option>
                                                    <option value="febrero">{{__('Febrero')}}</option>
                                                    <option value="marzo">{{__('Marzo')}}</option>
                                                    <option value="abril">{{__('Abril')}}</option>
                                                    <option value="mayo">{{__('Mayo')}}</option>
                                                    <option value="junio">{{__('Junio')}}</option>
                                                    <option value="julio">{{__('Julio')}}</option>
                                                    <option value="agosto">{{__('Agosto')}}</option>
                                                    <option value="septiembre">{{__('Septiembre')}}</option>
                                                    <option value="octubre">{{__('Octubre')}}</option>
                                                    <option value="noviembre">{{__('Noviembre')}}</option>
                                                    <option value="diciembre">{{__('Diciembre')}}</option>
                                                </select></div>
                                            </div>
                                            <div class="row" id="div1Fecha">
                                                <div class="col"><b id="input1Fecha">{{__('Desde')}}</b> </div>
                                                <div class="col"><b id="input2Fecha">{{__('Hasta')}}</b> </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col"><input id="input3Fecha" name="desde" value="" class="form-control" type="date"></div>
                                                <div class="col"><input id="input4Fecha" name="hasta" value="" class="form-control" type="date"></div>
                                            </div>
                                        </div>
                                        <div id="articulo" class="tab-pane fade">

                                            <div class="row">
                                                <div class="col"><b>{{__('Artículo')}}</b> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><input name="articulo" class="form-control" type="text" value=""></div>
                                            </div><br>
                                        </div>
                                        <div id="equipo" class="tab-pane fade">

                                            <div class="row">
                                                <div class="col"><b>{{__('Equipo/Linea/Ref')}}</b></div>
                                            </div>

                                            <div class="row">

                                                <div class="col"><input name="equipo" class="form-control" type="text" value=""></div>
                                            </div><br>
                                        </div>
                                        <div id="departamento" class="tab-pane fade">

                                            <div class="row">
                                                <div class="col">
                                                    <b>{{__('Departamento:')}}</b>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <select name="departamento" id="" class="form-control" required>
                                                        @foreach ($departamentos as $departamento)
                                                        <option value="0">{{__('Selecciona una opción')}}</option>
                                                        <option value="{{$departamento->Departamento}}">{{__($departamento->Nombre)}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                          </div>
                                      </div>

                                </div>
                            </div>
                            <br>
                        </div>
                            <input type="hidden" id="firstDayOfWeek" name="firstDayOfWeek" />
                            <input type="hidden" id="lastDayOfWeek" name="lastDayOfWeek" />
                            <input type="hidden" id="firstDayOfMonth" name="firstDayOfMonth" />
                            <input type="hidden" id="lastDayOfMonth" name="lastDayOfMonth" />
                            <input type="hidden" id="firstDayOfYear" name="firstDayOfYear" />
                            <input type="hidden" id="lastDayOfYear" name="lastDayOfYear" />
                            <input type="hidden" id="firstDayOfJanuary" name="firstDayOfJanuary" />
                            <input type="hidden" id="lastDayOfJanuary" name="lastDayOfJanuary" />
                            <input type="hidden" id="firstDayOfFebruary" name="firstDayOfFebruary" />
                            <input type="hidden" id="lastDayOfFebruary" name="lastDayOfFebruary" />
                            <input type="hidden" id="firstDayOfMarch" name="firstDayOfMarch" />
                            <input type="hidden" id="lastDayOfMarch" name="lastDayOfMarch" />
                            <input type="hidden" id="firstDayOfApril" name="firstDayOfApril" />
                            <input type="hidden" id="lastDayOfApril" name="lastDayOfApril" />
                            <input type="hidden" id="firstDayOfMay" name="firstDayOfMay" />
                            <input type="hidden" id="lastDayOfMay" name="lastDayOfMay" />
                            <input type="hidden" id="firstDayOfJune" name="firstDayOfJune" />
                            <input type="hidden" id="lastDayOfJune" name="lastDayOfJune" />
                            <input type="hidden" id="firstDayOfJuly" name="firstDayOfJuly" />
                            <input type="hidden" id="lastDayOfJuly" name="lastDayOfJuly" />
                            <input type="hidden" id="firstDayOfAugust" name="firstDayOfAugust" />
                            <input type="hidden" id="lastDayOfAugust" name="lastDayOfAugust" />
                            <input type="hidden" id="firstDayOfSeptember" name="firstDayOfSeptember" />
                            <input type="hidden" id="lastDayOfSeptember" name="lastDayOfSeptember" />
                            <input type="hidden" id="firstDayOfOctober" name="firstDayOfOctober" />
                            <input type="hidden" id="lastDayOfOctober" name="lastDayOfOctober" />
                            <input type="hidden" id="firstDayOfNovember" name="firstDayOfNovember" />
                            <input type="hidden" id="lastDayOfNovember" name="lastDayOfNovember" />
                            <input type="hidden" id="firstDayOfDecember" name="firstDayOfDecember" />
                            <input type="hidden" id="lastDayOfDecember" name="lastDayOfDecember" />
                            </div>


                        </div>
                        <div class="card-footer">
                            <center>
                                <button type="submit" class="btn btn-primary">{{__('Consultar')}}</button>
                            </center>
                        </form>

                        </div>

                    </div>


                </div>
    </div>
    </div>
        <!-- FIN Formulario de Reportes-->
        <!-- Resultado PEDIDOS Formulario -->
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('Graficas de Pedidos')}}</h5>
                    <div class="card-tools">
                        <a  href="EreportD/'.$pID.'/'.$pTipo.'/'.$pDepartamento.'/'.$pFrom.'/'.$pTo.'" type="button" class="btn btn-tool">
                           {{ __('Descargar reporte')}}
                            <i class="fas fa-file-excel"></i></a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i  class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                         <i  class="fas fa-times"></i>
                        </button>

                        </div>
                </div>
                <div class="card-body">
                  <select id="select-graficas" class="form-control">
                    <option value="container">{{__('Gráfica de linea | Pedido por Importe')}}</option>

                  </select>
                    <div class="row">
                        <div class="col-sm-8 col-12">
                            <figure class="highcharts-figure">
                                <div id="container"></div>


                              </figure>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tabla-seccion">
                                        <div class="tabla-contenedor">
                                    <table class="table table-sm table-striped">
                                        <tr>
                                            <th>{{__('Pedido')}}</th>
                                            <th>{{__('Descripcion')}}</th>
                                            <th>{{__('Importe')}}</th>
                                        </tr><?php $count=0; ?>
                                        @foreach ($data as $pedido)
                                        <?php $count++; ?>
                                        @if ($count == 4)
                                            @break
                                        @endif
                                <tr>
                                    <td>{{$pedido->Pedido}}</td>
                                    <td><ul>@foreach ($pedido->desc as $item)

                                            <li>{{__($item->Descripcion)}}({{number_format($item->Cantidad)}}  {{$item->Unidad}})</li>


                                        @endforeach</ul>
                                    </td>
                                    <td>{{number_format($pedido->Importe, 2, '.', '')}}</td>
                                </tr>
                                @endforeach

                                        <?php $count++; ?>



                                    </table>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="datos-UAT">
                        <div class="tabla-seccion">
                        <div class="tabla-contenedor">
                        <table class="table table-striped">
                            <tr class="bg-success">
                                {{__('Articulos en dolares')}}
                            </tr>
                            <tr class="bg-secondary">
                                <th>{{__('Pedido')}}</th>
                                <th>{{__('Descripcion')}}</th>
                                <th>{{__('Referencia')}}</th>
                                <th>{{__('Estatus')}}</th>
                                <th>{{__('Importe')}}</th>
                            </tr>

                                @foreach ($data as $pedido)
                                {{$pedido->venta->TipoCambio}}
                                @if (str_contains($pedido->venta->TipoCambio, 'Dolares'))
                                <tr>
                                    <td>{{$pedido->Pedido}}</td>
                                    <td><ul>@foreach ($pedido->desc as $item)

                                            <li>{{__($item->Descripcion)}}({{number_format($item->Cantidad)}}  {{$item->Unidad}})</li>


                                        @endforeach</ul>
                                    </td>
                                    <td>{{$pedido->Referencia}}</td>
                                    <td>{{$pedido->Estatus}}</td>
                                    <td>{{number_format($pedido->Importe, 2, '.', '')}}</td>
                                </tr>
                                @endif
                                @endforeach


                        </table>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>

        <!-- FIN Resultado TIPO CONSUMOS Formulario -->


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    var timeoutID;
    var cierraSesionIrLogeo = "{{route('salir', app()->getLocale())}}";

    function setup() {
      this.addEventListener("mousemove", resetTimer, false);
      this.addEventListener("mousedown", resetTimer, false);
      this.addEventListener("keypress", resetTimer, false);
      this.addEventListener("DOMMouseScroll", resetTimer, false);
      this.addEventListener("mousewheel", resetTimer, false);
      this.addEventListener("touchmove", resetTimer, false);
      this.addEventListener("MSPointerMove", resetTimer, false);

      startTimer();
    }
    setup();

    function startTimer() {
      // wait 2 seconds before calling goInactive
      timeoutID = window.setTimeout(goInactive, 600000);
    }

    function resetTimer(e) {
      window.clearTimeout(timeoutID);

      goActive();
    }

    function goInactive() {
      // do something
      // alert("inactivo");
      window.location=window.location=cierraSesionIrLogeo;
    }

    function goActive() {
      // do something

      startTimer();
    }
    </script>
    <script>

Highcharts.chart('container', {

title: {
  text: '{{__('Grafica lineal de Pedidos por Importe')}}',
  align: 'left'
},

yAxis: {
  title: {
    text: '{{__('Importe')}}'
  }
},

xAxis: {
    categories: [
                @foreach ($data as $nombre)
                '{{$nombre->Pedido}}',
                @endforeach
                ]
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

plotOptions: {
  series: {
    label: {
      connectorAllowed: false
    },

  }
},

series: [ {


  name: '{{$_SESSION['usuario']->Nombre}}',
  data: [
@foreach ($data as $importe)
{{$importe->Importe}},
@endforeach]
}],

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
        </script>
                  <script>
                    $(document).ready(function() {
        $('#container').show();
        $('#container1').hide();
        $('#container2').hide();
        $('#container3').hide();
      });
                    $('#select-graficas').on('change', function() {
    var container = $(this).val();
    if (container === 'container') {
        $('#container').show();
        $('#container1').hide();
        $('#container2').hide();
        $('#container3').hide();
    } else if (container === 'container1') {
        $('#container').hide();
        $('#container1').show();
        $('#container2').hide();
        $('#container3').hide();
    } else if (container === 'container2') {
        $('#container').hide();
        $('#container1').hide();
        $('#container2').show();
        $('#container3').hide();
    } else if (container === 'container3') {
        $('#container').hide();
        $('#container1').hide();
        $('#container2').hide();
        $('#container3').show();
    }
});

                  </script>
                  <script>
                    const today = new Date();

                    const firstDayOfWeek = new Date(today.setDate(today.getDate() - today.getDay() + 1));
                    document.getElementById('firstDayOfWeek').value = firstDayOfWeek.toISOString().split('T')[0];

                    const lastDayOfWeek = new Date(today.setDate(today.getDate() - today.getDay() + 7));
                    document.getElementById('lastDayOfWeek').value = lastDayOfWeek.toISOString().split('T')[0];

                    const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
                    document.getElementById('firstDayOfMonth').value = firstDayOfMonth.toISOString().split('T')[0];

                    const
                    lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                    document.getElementById('lastDayOfMonth').value = lastDayOfMonth.toISOString().split('T')[0];

                    const firstDayOfYear = new Date(today.getFullYear(), 0, 1);
                    document.getElementById('firstDayOfYear').value = firstDayOfYear.toISOString().split('T')[0];

                    const lastDayOfYear = new Date(today.getFullYear(), 11, 31);
                    document.getElementById('lastDayOfYear').value = lastDayOfYear.toISOString().split('T')[0];

                    const firstDayOfJanuary = new Date(today.getFullYear(), 0, 1);
                    document.getElementById('firstDayOfJanuary').value = firstDayOfJanuary.toISOString().split('T')[0];

                    const lastDayOfJanuary = new Date(today.getFullYear(), 0, 31);
                    document.getElementById('lastDayOfJanuary').value = lastDayOfJanuary.toISOString().split('T')[0];

                    const firstDayOfFebruary = new Date(today.getFullYear(), 1, 1);
                    document.getElementById('firstDayOfFebruary').value = firstDayOfFebruary.toISOString().split('T')[0];

                    const lastDayOfFebruary = new Date(today.getFullYear(), 1, 28);
                    if (lastDayOfFebruary.getDate() === 29) {
                    lastDayOfFebruary.setDate(28);
                    }
                    document.getElementById('lastDayOfFebruary').value = lastDayOfFebruary.toISOString().split('T')[0];

                    const firstDayOfMarch = new Date(today.getFullYear(), 2, 1);
                    document.getElementById('firstDayOfMarch').value = firstDayOfMarch.toISOString().split('T')[0];

                    const lastDayOfMarch = new Date(today.getFullYear(), 2, 31);
                    document.getElementById('lastDayOfMarch').value = lastDayOfMarch.toISOString().split('T')[0];

                    const firstDayOfApril = new Date(today.getFullYear(), 3, 1);
                    document.getElementById('firstDayOfApril').value = firstDayOfApril.toISOString().split('T')[0];

                    const lastDayOfApril = new Date(today.getFullYear(), 3, 30);
                    document.getElementById('lastDayOfApril').value = lastDayOfApril.toISOString().split('T')[0];

                    const firstDayOfMay = new Date(today.getFullYear(), 4, 1);
                    document.getElementById('firstDayOfMay').value = firstDayOfMay.toISOString().split('T')[0];

                    const lastDayOfMay = new Date(today.getFullYear(), 4, 31);
                    document.getElementById('lastDayOfMay').value = lastDayOfMay.toISOString().split('T')[0];

                    const firstDayOfJune = new Date(today.getFullYear(), 5, 1);
                    document.getElementById('firstDayOfJune').value = firstDayOfJune.toISOString().split('T')[0];

                    const lastDayOfJune = new Date(today.getFullYear(), 5, 30);
                    document.getElementById('lastDayOfJune').value = lastDayOfJune.toISOString().split('T')[0];

                    const firstDayOfJuly = new Date(today.getFullYear(), 6, 1);
                    document.getElementById('firstDayOfJuly').value = firstDayOfJuly.toISOString().split('T')[0];

                    const lastDayOfJuly = new Date(today.getFullYear(), 6, 31);
                    document.getElementById('lastDayOfJuly').value = lastDayOfJuly.toISOString().split('T')[0];

                    const firstDayOfAugust = new Date(today.getFullYear(), 7, 1);
                    document.getElementById('firstDayOfAugust').value = firstDayOfAugust.toISOString().split('T')[0];

                    const lastDayOfAugust = new Date(today.getFullYear(), 7, 31);
                    document.getElementById('lastDayOfAugust').value = lastDayOfAugust.toISOString().split('T')[0];

                    const firstDayOfSeptember = new Date(today.getFullYear(), 8, 1);
                    document.getElementById('firstDayOfSeptember').value = firstDayOfSeptember.toISOString().split('T')[0];

                    const lastDayOfSeptember = new Date(today.getFullYear(), 8, 30);
                    document.getElementById('lastDayOfSeptember').value = lastDayOfSeptember.toISOString().split('T')[0];

                    const firstDayOfOctober = new Date(today.getFullYear(), 9, 1);
                    document.getElementById('firstDayOfOctober').value = firstDayOfOctober.toISOString().split('T')[0];

                    const lastDayOfOctober = new Date(today.getFullYear(), 9, 31);
                    document.getElementById('lastDayOfOctober').value = lastDayOfOctober.toISOString().split('T')[0];

                    const firstDayOfNovember = new Date(today.getFullYear(), 10, 1);
                    document.getElementById('firstDayOfNovember').value = firstDayOfNovember.toISOString().split('T')[0];

                    const lastDayOfNovember = new Date(today.getFullYear(), 10, 30);
                    document.getElementById('lastDayOfNovember').value = lastDayOfNovember.toISOString().split('T')[0];

                    const firstDayOfDecember = new Date(today.getFullYear(), 11, 1);
                    document.getElementById('firstDayOfDecember').value = firstDayOfDecember.toISOString().split('T')[0];

                    const lastDayOfDecember = new Date(today.getFullYear(), 11, 31);
                    document.getElementById('lastDayOfDecember').value = lastDayOfDecember.toISOString().split('T')[0];

                    const mySelect = document.getElementById("selectFechaRapida");
                    const input1 = document.getElementById("input1Fecha");
                    const input2 = document.getElementById("input2Fecha");
                    const input3 = document.getElementById("input3Fecha");
                    const input4 = document.getElementById("input4Fecha");

                    mySelect.addEventListener("change", function() {
                      if (mySelect.value === "Seleccion detallada") {
                        input1.style.display = "block";
                        input2.style.display = "block";
                        input3.style.display = "block";
                        input4.style.display = "block";
                      } else {
                        input1.style.display = "none";
                        input2.style.display = "none";
                        input3.style.display = "none";
                        input4.style.display = "none";
                      }
                    });

                        </script>
                        <script>
                            function goBack() {
                              window.history.back();
                            }
                        </script>

@stop
