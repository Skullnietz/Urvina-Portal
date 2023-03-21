@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
<style>
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

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
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
.highcharts-credits {
display: none !important;
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
                <h1>{{__('Consultas del Cliente')}}</h1>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="basic-addon1">
                </div>
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
                        <b>Hugo Reyna</b>
                </a>
                <hr><br>
                <a href="">
                    <i class="fas fa-phone"></i><br>
                    <b>884 439 3695</b>
                </a>
                <hr><br>
                <a href="">
                    <i class="fas fa-envelope"></i><br>
                    <small>almacen.saltillo@urvina.com.mx</small>
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
                    <i style="color:white" class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i style="color:white" class="fas fa-times"></i>
                    </button>
                    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">

                        <form action="{{route('reporteC', app()->getLocale())}}" method="get">

                        <div class="row">
                            <div class="col"><b>{{__('Desde')}}</b> </div>
                            <div class="col"><b>{{__('Hasta')}}</b> </div>
                        </div>
                        <div class="row">
                            <div class="col"><input name="desde" value="" class="form-control" type="date"></div>
                            <div class="col"><input name="hasta" value="" class="form-control" type="date"></div>

                        </div><br>
                        <div class="row">

                            <div class="col"><b>{{__('Artículo')}}</b> </div>
                            <div class="col"><b>{{__('Equipo/Linea/Ref')}}</b></div>
                        </div>

                        <div class="row">
                            <div class="col"><input name="articulo" class="form-control" type="text" value=""></div>
                            <div class="col"><input name="equipo" class="form-control" type="text" value=""></div>
                        </div><br>
                        <div class="row">
                            <div class="col-3">
                                <b>{{__('Departamento:')}}</b>

                            </div>
                            <div class="col-9">
                                <select name="departamento" id="" class="form-control" required>
                                    @foreach ($departamentos as $departamento)
                                    <option value="">{{__('Selecciona una opción')}}</option>
                                    <option value="{{$departamento->Departamento}}">{{__($departamento->Nombre)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <br>

                    </div>
                    <div class="col-3">
                        <div class="card">

                            <div class="card-header bg-secondary"><center><b>{{__('Tipo de Reporte')}}</b></center></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio" name="tipo" value="Consumo"
                                                        aria-label="Radio button for following text input">
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

                            </div>
                        </div>


                    </div>

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
        <!-- FIN Formulario de Reportes-->
        <!-- Resultado TIPO CONSUMOS Formulario -->
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('Consumos')}}</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool">
                            {{__('Descargar reporte')}}
                            <i class="fas fa-file-excel"></i>
                            </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i  class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                         <i  class="fas fa-times"></i>
                        </button>

                        </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <figure class="highcharts-figure">
                                <div id="container"></div>

                              </figure>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>{{__('Proyecto')}}</th>
                                            <th>{{__('Cantidad')}}</th>
                                        </tr><?php $count=0; ?>
                                        @foreach ($dataConsulta as $data)
                                        <?php if($count == 5){break;}   ?>
                                        <tr>
                                            <td>{{__($data->Proyecto)}}</td>
                                            <td>{{number_format($data->Cantidad)}}</td>
                                        </tr>
                                        <?php $count++; ?>
                                        @endforeach


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="datos-UAT">
                        <table class="table table-striped">
                            <tr class="bg-secondary">
                                <th>{{__('Proyecto')}}</th>
                                <th>{{__('Cantidad')}}</th>
                                <th>{{__('Importe')}}</th>
                            </tr>

                                @foreach ($dataConsulta as $dataD)
                                <tr>
                                <td>{{__($dataD->Proyecto)}}</td>
                                <td>{{number_format($dataD->Cantidad)}}</td>
                                <td>{{number_format($dataD->Importe, 2, '.', '')}}</td>
                                </tr>
                                @endforeach

                        </table>
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
        // Create the chart
        Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
});

// Build the chart
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: '{{__('Consumo por Equipo/Proyecto/Referencia')}}',
    align: 'left'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        connectorColor: 'silver'
      },

    }
  },
  series: [{
    name: 'Share',
    data: [
        @foreach ($dataConsulta as $dataS)
      { name: '{{$dataS->Proyecto}}', y: {{$dataS->Importe}} },
      @endforeach
    ]
  }]
});
        </script>
@stop
