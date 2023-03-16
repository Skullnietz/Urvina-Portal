@extends('adminlte::page')

@section('title', __('Detalles de compra'))

@section('content_header')
<div class="container">
    <div class="row">
        <div class="col-6"><h1>{{__('Detalles de compra')}}</h1></div>
        <div class="col-6"> <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
          </div></div>
    </div>
</div>
@stop

@section('content')
@include('sweetalert::alert')
    <div class="container">
         <!-- Pedido Pesos -->
            <div class="card">
                <div class="row"></div>
                <div class="col-12 "><br>
                    <center>
                        <div class="border rounded">
                            <b>{{__('Su Pedido en Pesos fué levantado correctamente con numero:')}}</b>  <br>
                                           <b style="color:blue; font-size:25px">{{$folio[0]->Folio}}</b>
                        </div>
                    </center>
                    <br>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"><a href="" class="btn btn-danger"> {{__('Cancelar')}}</a>&nbsp;&nbsp;<a href="{{route('printpedido', [app()->getLocale()])}}" target="_blank" class="btn btn-warning"> {{__('Imprimir')}}</a>&nbsp;&nbsp;<a href="" class="btn btn-primary"> {{__('Continuar')}}</a></div>
                        <div class="col-4"></div>
                    </div>
                    <br>
                </div>
            </div>
            <!-- FIN Pedido Pesos -->



    </div>
@stop

@section('right-sidebar')
<div class="container">
    <center>
        <br>
<h3>Contacto</h3>
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
@stop
