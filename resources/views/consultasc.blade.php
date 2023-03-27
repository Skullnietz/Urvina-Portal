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
                <label>Primer día de la semana:</label>
  <input type="text" id="firstDayOfWeek" name="firstDayOfWeek">

  <label>Último día de la semana:</label>
  <input type="text" id="lastDayOfWeek" name="lastDayOfWeek">

  <label>Último día del mes:</label>
  <input type="text" id="lastDayOfMonth" name="lastDayOfMonth">

  <label>Primer día del mes:</label>
  <input type="text" id="firstDayOfMonth" name="firstDayOfMonth">

  <label>Primer día del año:</label>
  <input type="text" id="firstDayOfYear" name="firstDayOfYear">

  <label>Último día del año:</label>
  <input type="text" id="lastDayOfYear" name="lastDayOfYear">

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
let today = new Date();
let firstDayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay() + 1);
let lastDayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay() + 7);
let lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
let firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
let firstDayOfYear = new Date(today.getFullYear(), 0, 1);
let lastDayOfYear = new Date(today.getFullYear(), 11, 31);

document.getElementById("firstDayOfWeek").value = firstDayOfWeek.toLocaleDateString();
document.getElementById("lastDayOfWeek").value = lastDayOfWeek.toLocaleDateString();
document.getElementById("lastDayOfMonth").value = lastDayOfMonth.toLocaleDateString();
document.getElementById("firstDayOfMonth").value = firstDayOfMonth.toLocaleDateString();
document.getElementById("firstDayOfYear").value = firstDayOfYear.toLocaleDateString();
document.getElementById("lastDayOfYear").value = lastDayOfYear.toLocaleDateString();

    </script>
@stop
