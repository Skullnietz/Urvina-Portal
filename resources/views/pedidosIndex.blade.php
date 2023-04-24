@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
<div class="container">
    <div class="row">
        <div class=" col-md-5 col-xs-6"><h1><a href="#" onclick="goBack()" class="border rounded" >&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;</a>&nbsp;&nbsp;&nbsp;{{__('Mis Pedidos')}}</h1></div>
        <div class=" col-md-5 col-xs-5"> <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
            <form action="{{route('search', app()->getLocale())}}" method="get">
                <input type="text" id="search" name="item" class="form-control" placeholder="{{__('Buscar')}}" pattern="[A-Za-z0-9]{2,10}" aria-describedby="basic-addon1">
            </form>
          </div></div>
          <div class="col-md-2 col-xs-2">
            <a href="{{route(Route::currentRouteName(),'en')}}">
                <img src="/icons/en.svg" style="width:50px" alt="EN">
              </a>
              <a href="{{route(Route::currentRouteName(), 'es' )}}">
                <img src="/icons/es.svg" style="width:50px" alt="ES">
              </a>

          </div>
    </div>
</div>

    <br>

@stop

@section('content')
<div class="container">
    <style>
        a {
            color: inherit;
            /* blue colors for links too */
            text-decoration: inherit;
            /* no underline */
        }
    </style>
    @foreach ($data as $pedido)
    @if(count($pedido->desc) > 0 )
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <?php $Date = $pedido->CFecha ?>
                {{$Date->format('l, j F Y')}}
            </div>
            <div class="card-body">
                    <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2 d-flex align-items-center"> <div class="mx-auto"> <b> <h4>{{$pedido->Pedido}}</h4> </b> </div> </div>
                    <div class="col-md-8 col-sm-8 col-xs-8 ">
                        @foreach ($pedido->desc as $descpedido)
                        <hr>

                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-2 d-flex align-items-center"><div class="mx-auto"><?php if (file_exists(public_path() . '/images/catalogo/' . trim($descpedido->Articulo) . '.jpg')) {
                                echo '<img width="100px" class="border rounded" id="img-1" src="/images/catalogo/' . trim($descpedido->Articulo) . '.jpg" alt="$ART">';
                            } else {
                                echo '<img class="border rounded" id="img-1" src="/img/productos/default_product.png" alt="no img" style="width:100px">';
                            }
                            ?></div></div>
                            <div class="col-md-10 col-sm-10 col-xs-10"><div class="row">{{__($descpedido->art->Descripcion1)}}</div>
                            @if ($descpedido->Unidad == 'pza' || $descpedido->Unidad == 'par')
                                                <div class="row"><h5>{{intval($descpedido->Cantidad)}} {{__($descpedido->Unidad)}}</h5></div>
                                                @else
                                                <div class="row"><h5>{{$descpedido->Cantidad}} {{__($descpedido->Unidad)}}</h5></div>
                                                @endif
                            </div>


                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2 d-flex align-items-center"><div class="mx-auto"><a href="{{route('showpedido', [app()->getLocale(), $pedido->ID])}}" class="btn btn-primary">{{__('Ver Pedido')}}</a></div></div><hr>
                    </div>


                </div>

            </div>
        </div>
    </div>
    @endif
    @endforeach
    </div>

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
        // Barra de busqueda
        document.getElementById('search')
    .addEventListener('keyup', function(event) {
        if (event.code === 'Enter')
        {
            event.preventDefault();
            document.querySelector('form').submit();
        }
    });
    </script>
    <script>
        function goBack() {
          window.history.back();
        }
    </script>

@stop
