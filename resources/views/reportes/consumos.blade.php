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
                        <form action="{{route('reporteC', app()->getLocale())}}" method="get">
                        <div class="row">
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
                            <div class="col-9">
                                <div class="card">
                                <div class="card-header bg-primary" data-card-widget="collapse"> <center><b>{{__('Información detallada (Opcional)')}}</b></center></div>
                                <div class="card-body">


                                    <ul class="nav nav-tabs">
                                        <li style="margin-right:10px"><a class="btn btn-secondary checked" data-toggle="tab" href="#fecha">{{__('Fecha')}}</a></li>
                                        <li style="margin-right:10px"><a class="btn btn-secondary checked" data-toggle="tab" href="#articulo">{{__('Articulo')}}</a></li>
                                        <li style="margin-right:10px"><a class="btn btn-secondary checked" data-toggle="tab" href="#equipo">{{__('Equipo')}}</a></li>
                                        <li style="margin-right:10px"><a class="btn btn-secondary checked" data-toggle="tab" href="#departamento">{{__('Departamento')}}</a></li>
                                    </ul>

                                      <div class="tab-content" style="margin-top:10px">

                                        <div id="fecha" class="tab-pane fade in active">
                                            <div class="row">
                                                <div class="col"><b>{{__('Desde')}}</b> </div>
                                                <div class="col"><b>{{__('Hasta')}}</b> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><input name="desde" value="" class="form-control" type="date"></div>
                                                <div class="col"><input name="hasta" value="" class="form-control" type="date"></div>

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
                                                <div class="col-3">
                                                    <b>{{__('Departamento:')}}</b>

                                                </div>
                                                <div class="col-9">
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
                    <h5 class="card-title">{{__('Graficas de Consumos')}}</h5>
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
                  <select id="select-graficas" class="form-control">
                    <option value="container">Gráfica de barra | Consumo por Cantidades</option>
                    <option value="container1">Gráfica de pastel | Consumo por Cantidades</option>
                    <option value="container2">Gráfica de barra | Consumo por Importe</option>
                    <option value="container3">Gráfica de pastel | Consumo por Importe</option>
                  </select>
                    <div class="row">
                        <div class="col">
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                                <div id="container1"></div>
                                <div id="container2"></div>
                                <div id="container3"></div>

                              </figure>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>{{__('Articulo')}}</th>
                                            <th>{{__('Nombre')}}</th>
                                            <th>{{__('Cantidad')}}</th>
                                        </tr><?php $count=0; ?>
                                        @foreach ($dataConsulta as $data)
                                        <?php if($count == 3){break;}   ?>
                                        <tr>
                                            <td>{{$data->Articulo}}</td>
                                            <td>{{__($data->Descripcion)}}</td>
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
                                <th>{{__('Articulo')}}</th>
                                <th>{{__('Descripcion')}}</th>
                                <th>{{__('Cantidad')}}</th>
                                <th>{{__('Importe')}}</th>
                            </tr>

                                @foreach ($dataConsulta as $dataD)
                                <tr>
                                <td>{{$dataD->Articulo}}</td>
                                <td>{{__($dataD->Descripcion)}}</td>
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
        // Grafica de Cantidad Pastel
        Highcharts.chart('container1', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    align: 'left',
    text: '{{__('Consumos por articulo en Cantidades')}}'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      depth: 35,
      dataLabels: {
        enabled: true,
        format: '{point.name}'
      }
    }
  },
  series: [{
    type: 'pie',
    name: 'Share',
    data: [
        @foreach ($dataConsulta as $dataS2)
      ['{{__($dataS2->Articulo)}}', {{__($dataS2->Cantidad)}}],
      @endforeach
    ]
  }]
});
</script>
<script>
  // Grafica de Cantidad Pastel
  Highcharts.chart('container3', {
chart: {
type: 'pie',
options3d: {
enabled: true,
alpha: 45,
beta: 0
}
},
title: {
align: 'left',
text: '{{__('Consumos por articulo en Importe')}}'
},
accessibility: {
point: {
valueSuffix: '%'
}
},
tooltip: {
pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
},
plotOptions: {
pie: {
allowPointSelect: true,
cursor: 'pointer',
depth: 35,
dataLabels: {
  enabled: true,
  format: '{point.name}'
}
}
},
series: [{
type: 'pie',
name: 'Share',
data: [
  @foreach ($dataConsulta as $dataS4)
['{{__($dataS4->Articulo)}}', {{__($dataS4->Importe)}}],
@endforeach
]
}]
});
</script>

<script>
Highcharts.chart('container', {
  //Grafica de Cantidad Barra
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: '{{__('Consumos por articulo en Cantidades')}}'
  },
  xAxis: {
    categories: ['{{__('Articulo')}}'],
  },
  yAxis: {
    allowDecimals: false,
    title: {
        text: '{{__('Cantidad')}}'
    }
  },
  legend: {
    align: 'right',
    verticalAlign: 'middle',
    layout: 'vertical'
  },

  credits: { enabled: false },

  series: [
@foreach ($dataConsulta as $dataS)
    {
    name: '{{$dataS->Articulo}}',
    data: [{{$dataS->Cantidad}}]
  },
@endforeach
],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 500
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        },
        yAxis: {
          labels: {
            align: 'left',
            x: 0,
            y: -5
          },
          title: {
            text: null
          }
        },
        subtitle: {
          text: null
        },
        credits: {
          enabled: false
        }
      }
    }]
  }
});
        </script>
        <script>
          Highcharts.chart('container2', {
            //Grafica de Cantidad Barra
            chart: {
              type: 'column'
            },
            title: {
              align: 'left',
              text: '{{__('Consumos por articulo en Importe')}}'
            },
            xAxis: {
              categories: ['{{__('Articulo')}}'],
            },
            yAxis: {
              allowDecimals: false,
              title: {
                  text: '{{__('Importe')}}'
              }
            },
            legend: {
              align: 'right',
              verticalAlign: 'middle',
              layout: 'vertical'
            },

            credits: { enabled: false },

            series: [
          @foreach ($dataConsulta as $dataS3)
              {
              name: '{{$dataS3->Articulo}}',
              data: [{{$dataS3->Importe}}]
            },
          @endforeach
          ],
            responsive: {
              rules: [{
                condition: {
                  maxWidth: 500
                },
                chartOptions: {
                  legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    layout: 'horizontal'
                  },
                  yAxis: {
                    labels: {
                      align: 'left',
                      x: 0,
                      y: -5
                    },
                    title: {
                      text: null
                    }
                  },
                  subtitle: {
                    text: null
                  },
                  credits: {
                    enabled: false
                  }
                }
              }]
            }
          });
                  </script>
                  <script>
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

@stop
