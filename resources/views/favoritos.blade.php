@extends('adminlte::page')

@section('title', __('Favoritos'))

@section('content_header')
<div class="container">
    <div class="row">
        <div class=" col-md-9 col-9"><h4><a href="#" onclick="goBack()" class="border rounded" >&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;</a>&nbsp;&nbsp;&nbsp;{{__('Favoritos')}}</h4></div>
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
    <style>
        a {
            color: inherit;
            /* blue colors for links too */
            text-decoration: inherit;
            /* no underline */
        }

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
        @media (min-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */
            .img-card-top{
                height:11rem;
                margin-top:10px;
                max-width:14.5rem;

            }
            .card{
                width: 15rem;
                height:21rem;

            }
            .bandera{
                width:30px;
            }
        }
        @media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
            .img-card-top{
                height:10rem;
                max-width:9.5rem;
                margin-top:10px;

            }
            .card{
                width: 10rem;
                height:23rem;
            }
            .bandera{
                width:30px;
            }
        }
        @media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
            .img-card-top{
                height:11rem;
                margin-top:10px;
                max-width:9.5rem;

            }
            .card{
                width: 10rem;
                height:23rem;

            }
            .bandera{
                width:45px;
            }
        }
        @media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
            .img-card-top{
                height:11rem;
                max-width:14.5rem;
                margin-top:10px;

            }
            .card{
                width: 15rem;
                height:21rem;

            }
            .bandera{
                width:45px;
            }
        }
        @media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */
            .img-card-top{
                height:11rem;
                margin-top:10px;

            }
            .card{
                width: 15rem;
                height:21rem;

            }
            .bandera{
                width:45px;
            }
        }
        @media (min-width:1281px) { /* hi-res laptops and desktops */
            .img-card-top{
                height:11rem;
                margin-top:10px

            }
            .card{
                width: 15rem;
                height:21rem;

            }
            .bandera{
                width:45px;
            }
        }
    </style>
    <div class="container">

<div class="row">
        @foreach ($favoritos as $articulo)
            <div class="col-md-3 col-sm-6 col-xs-6 d-flex align-items-center"  >
                    <div class="mx-auto">
                <?php $ART = trim($articulo->articulo); ?>
                <a href="{{route('item', [app()->getLocale(), $ART])}}">
                    <div class="card grow text-center" style="" >
                        <?php if (file_exists(public_path() . '/images/catalogo/' . $ART . '.jpg')) {
                            echo '<img class="img-card-top mx-auto"  src="/images/catalogo/' . $ART . '.jpg" alt="$ART">';
                        } else {
                            echo '<img class="img-card-top mx-auto"  src="/img/productos/default_product.png" alt="no img">';
                        }
                        ?>
                        <div class="card-body border-top">

                            <div class="row ">
                                <button class="btn btn-xs btn-primary"><a
                                    href=""><b>{{ trim($articulo->Codigo) }}</b></a></button>
                                <div ><small><b>{{ __(trim($articulo->Descripcion)) }}
                                        </b></small><br>
                                       <small style="color: #00a650"><b>{{ $ART }}</b></small>
                                    <br>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
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
