@extends('adminlte::page')

@section('title', __('Detalles de compra'))

@section('content_header')
<div class="container">
    <div class="row">
        <div class=" col-md-9 col-9"><h4><a href="#" onclick="goBack()" class="border rounded" >&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;</a>&nbsp;&nbsp;&nbsp;{{__('Detalles de compra')}}</h4></div>
        <div class="col-md-3 col-3 ml-auto">
            <a href="{{route(Route::currentRouteName(),'en')}}">
                <img src="/icons/en.svg" class="bandera" alt="EN">
              </a>
              <a href="{{route(Route::currentRouteName(), 'es' )}}">
                <img src="/icons/es.svg" class="bandera"  alt="ES">
              </a>

          </div>


    </div>
</div>
@stop

@section('content')
<style>
    a {
        color: inherit;
        /* blue colors for links too */
        text-decoration: inherit;
        /* no underline */
    }
    @media (min-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */
            .bandera{
                width:30px;
            }
        }
        @media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
            .bandera{
                width:30px;
            }

        }
        @media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
            .bandera{
                width:30px;
            }

        }
        @media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
            .bandera{
                width:45px;
            }
        }
        @media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */
            .bandera{
                width:45px;
            }

        }
        @media (min-width:1281px) { /* hi-res laptops and desktops */
            .bandera{
                width:45px;
            }

        }
</style>
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
                        <div class="col-4"><a href="" class="btn btn-danger"> {{__('Cancelar')}}</a>&nbsp;&nbsp;<a href="{{route('printpedido', [app()->getLocale(), $IDV])}}" target="_blank" class="btn btn-warning"> {{__('Imprimir')}}</a>&nbsp;&nbsp;<a href="" class="btn btn-primary"> {{__('Continuar')}}</a></div>
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
    <script>
        function goBack() {
          window.history.back();
        }
    </script>
@stop
