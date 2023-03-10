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
                <div class="row">
                    <div class="col-9">

                        <div class="row">
                            <div class="col"><b>{{__('Desde')}}</b> </div>
                            <div class="col"><b>{{__('Hasta')}}</b> </div>
                        </div>
                        <div class="row">
                            <div class="col"><input class="form-control" type="date"></div>
                            <div class="col"><input class="form-control" type="date"></div>

                        </div><br>
                        <div class="row">

                            <div class="col"><b>{{__('Art??culo')}}</b> </div>
                            <div class="col"><b>{{__('Equipo/Linea/Ref')}}</b></div>
                        </div>

                        <div class="row">
                            <div class="col"><input class="form-control" type="text" class=""></div>
                            <div class="col"><input class="form-control" type="text"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-3">
                                <b>{{__('Departamento:')}}</b>

                            </div>
                            <div class="col-9">
                                <select name="" id="" class="form-control">
                                    <option value="">{{__('Mis movimientos')}}</option>
                                <option value="">{{__('Recursos Humanos')}}</option>
                                </select>
                            </div>
                        </div><br>

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
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <b class="form-control">{{__('Consumos')}}</b>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <b class="form-control">{{__('Pedidos')}}</b>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <b class="form-control">{{__('Inventarios')}}</b>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <b class="form-control">{{__('Consumo Mensual')}}</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <b class="form-control">{{__('Consumo Articulo')}}</b>
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
                    <button class="btn btn-primary">{{__('Consultar')}}</button>
                </center>

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
      timeoutID = window.setTimeout(goInactive, 300000);
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
@stop
