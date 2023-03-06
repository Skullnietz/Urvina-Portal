@extends('adminlte::page')

@section('title', __('Busqueda'))

@section('content_header')
<div class="container">
    <div class="row">
        <div class="col-6"><h1>{{__('Busqueda')}}</h1></div>
        <div class="col-4"> <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
            <form action="{{route('search', app()->getLocale())}}" method="get">
                <input type="text" id="search" name="item" class="form-control" placeholder="{{__('Buscar')}}" pattern="[A-Za-z0-9]{2,10}" aria-describedby="basic-addon1">
            </form>
          </div></div>
          <div class="col-2">
            <a href="{{route(Route::currentRouteName(),'en')}}">
                <img src="/icons/en.svg" style="width:50px" alt="EN">
              </a>
              <a href="{{route(Route::currentRouteName(), 'es' )}}">
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
@include('sweetalert::alert')
    <style>
        .grow {
            transition: 1s ease;
        }

        .grow:hover {

            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
            transition: 1s ease;
            z-index: 4;
        }

        a {
            color: inherit;
            /* blue colors for links too */
            text-decoration: inherit;
            /* no underline */
        }
    </style>
    <div class="container">

<div class="row">
        @foreach ($articulos as $articulo)
            <div class="col-md-6 col-xs-12">
                <?php $ART = trim($articulo->Articulo); ?>
                <a href="{{route('item', [app()->getLocale(), $ART])}}">
                    <div class="card grow">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-3"><?php if (file_exists(public_path() . '/images/catalogo/' . $ART . '.jpg')) {
                                    echo '<img src="/images/catalogo/' . $ART . '.jpg" alt="$ART"style="width:100px">';
                                } else {
                                    echo '<img src="/img/productos/default_product.png" alt="no img" style="width:100px">';
                                }
                                ?>
                                </div>
                                <div class="col-7"><small><b>{{ __(trim($articulo->Descripcion)) }}
                                        </b></small><br>
                                    <small>{{ $ART }}</small><br>
                                    <small style="color:blue;"><b><a
                                                href="">{{ trim($articulo->Codigo) }}</a></b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
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
@stop
