@extends('adminlte::page')

@section('title', __('Consultas Cliente'))

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>{{__('Consultas Cliente')}}</h1>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-2">
                <a href="{{route(Route::currentRouteName(), 'en')}}">
                    <img src="/icons/en.svg" style="width:50px" alt="EN">
                  </a>
                  <a href="{{route(Route::currentRouteName(), 'es')}}">
                    <img src="/icons/es.svg" style="width:50px" alt="ES">
                  </a>

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
                <b>{{$_SESSION['usuario']->AyudaNombre}}</b>
        </a>
        <hr><br>
            <a href="tel:+52{{$_SESSION['usuario']->Ayudatel}}" target="_blank">
                <i class="fas fa-phone"></i><br>
                <b>{{$_SESSION['usuario']->Ayudatel}}</b>
            </a>
            <hr><br>

            <a href="mailto:{{$_SESSION['usuario']->AyudaMail}}" target="_blank">
                <i class="fas fa-envelope"></i><br>
                <small>{{$_SESSION['usuario']->AyudaMail}}</small>
            </a>
        </div>
    </div>
</div>
</center>


@stop

@section('content')
    <div class="container">
        <!-- Formulario de Reportes-->
        <div class="row">
            <div class="col">
        <div class="card">

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
                                    <div class="row">
                                        <div class="col"><select class="form-control" name="fechaRapida" id="selectFechaRapida">
                                            <option value="semana">Semana</option>
                                            <option value="mes">Mes</option>
                                            <option value="anio">Año</option>
                                            <option value="enero">Enero</option>
                                            <option value="febrero">Febrero</option>
                                            <option value="marzo">Marzo</option>
                                            <option value="abril">Abril</option>
                                            <option value="mayo">Mayo</option>
                                            <option value="junio">Junio</option>
                                            <option value="julio">Julio</option>
                                            <option value="agosto">Agosto</option>
                                            <option value="septiembre">Septiembre</option>
                                            <option value="octubre">Octubre</option>
                                            <option value="noviembre">Noviembre</option>
                                            <option value="diciembre">Diciembre</option>
                                        </select></div>
                                    </div>
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



    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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



    </script>
@stop
