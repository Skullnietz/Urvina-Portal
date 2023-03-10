@extends('adminlte::page')

@section('title', __('Catalogo'))

@section('content_header')
<div class="container">
    <div class="row">
        <div class=" col-md-5 col-xs-6"><h1>{{__('Catalogo')}}</h1></div>
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
            background-color:white
        }

        a {
            color: inherit;
            /* blue colors for links too */
            text-decoration: inherit;
            /* no underline */
        }

    </style>
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

    <div class="card">
        <div class="card-body">
            <table id="catalogo" class=" table">
                <thead class="">
                    <tr class="bg-success">
                        <th style="width:110px">{{__('Categorias')}}</th>
                        <th style="">{{__('Categorias')}}</th>
                    <tr>
                </thead>
                <tbody>

                    @foreach ($catalogo as $articulo)
                        <tr class="grow">
                            <?php $category =trim($articulo->clave) ?>
                            <td><img src="<?php echo '/images/categoria/' . __(trim($articulo->clave)) . '.jpg'; ?>" alt="{{ trim($articulo->clave) }}" style="max-height:200px; "> </td>
                            <td style="vertical-align: middle"><a href="{{route('categoria', [app()->getLocale(), $category])}}"><h5>{{ __(trim($articulo->categoria)) }}</h5></a></td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@stop

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
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
        $(document).ready(function() {
            $('#catalogo').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "{{__('Mostrar')}} _MENU_ {{__('entradas')}}",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "{{__('Buscar:')}}",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "{{__('Primer')}}",
                        "last": "{{__('Ultimo')}}",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
            });
        });
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
