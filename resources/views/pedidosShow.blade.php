@extends('adminlte::page')

@section('title', 'Pedido')

@section('content_header')
<style>
    @media (min-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */

        }
        @media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */

        }
        @media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */

        }
        @media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
            .movebar{
                height:500px;
                overflow-x: auto;
                margin-bottom: 20px;
            }
        }
        @media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */
            .movebar{
                height:500px;
                overflow-x: auto;
                margin-bottom: 20px;
            }
        }
        @media (min-width:1281px) { /* hi-res laptops and desktops */
            .movebar{
                height:500px;
                overflow-x: auto;
                margin-bottom: 20px;
            }
        }
</style>

<div class="container">
    <div class="row">
        @if(isset($data[0]->articulo[0])) <div class=" col-md-5 col-xs-6"><h1>{{__('Pedido')}} <b> {{$data[0]->Pedido}}</b> | <b style="color:gray">#{{$id}}</b></h1></div> @else <div class="col-6"><h1>{{__('Pedido no encontrado')}}</h1></div>  @endif
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
@if(isset($data[0]->articulo[0]))
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 border-right movebar" >

            @foreach ($data as $pedido)

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" >
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4"><div class="d-flex align-items-center"><div class="mx-auto"><?php if (file_exists(public_path() . '/images/catalogo/' . trim($pedido->Articulo) . '.jpg')) {
                        echo '<img width="190px" class="border rounded" id="img-1" src="/images/catalogo/' . trim($pedido->Articulo) . '.jpg" alt="$ART">';
                    } else {
                        echo '<img class="border rounded" id="img-1" src="/img/productos/default_product.png" alt="no img" style="width:190px">';
                    }
                    ?></div></div></div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="row">
                            <h5>{{__($pedido->Descripcion)}}</h5>
                        </div>
                        <div class="row">
                            <h6>{{$pedido->Codigo}}</h6>
                        </div>
                        <div class="row"></div>
                        <div class="row">@if ($pedido->Unidad == 'pza' || $pedido->Unidad == 'par')
                            <div class="row"><span class="badge badge-secondary"><h5>{{intval($pedido->Cantidad)}} {{__($pedido->Unidad)}}</h5></span></div>
                            @else
                            <div class="row"><span class="badge badge-secondary"><h5>{{$pedido->Cantidad}} {{__($pedido->Unidad)}}</h5></span></div>
                            @endif</div>


                    </div>
                </div>




                </div>
            </div>
        </div>
        </div>
            @endforeach
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 d-flex"  style="background-color:#f9f9f9">
            <div class="container d-flex align-items-center" >
                <div class="mx-auto">

            <div class="row"><h5><b>{{__('Detalle de pedido:')}}</b></h5></div>
            <div class="row">{{$data[0]->CFecha->format('l, j F Y')}} &nbsp;| &nbsp;<b style="color:gray">#{{$id}}</b></div>
            <hr>
            <div class="row justify-content-between">
                <div>{{__('Departamento:')}} </div>

                <div>{{$data[0]->Departamento}}</div>
                <?php
                $cantartpeso = 0;
                $cantartdolar = 0;
                $sumaPDolar = 0;
                $sumaPPeso = 0;
                $Periodo = "";

                // Recorre cada objeto y suma su precio

                for ($i = 0; $i < count($data); $i++) {
                if(str_contains($data[$i]->articulo[0]->Moneda, "Dolares")){
                $cantartdolar = $cantartdolar+$data[$i]->Cantidad;
                $sumaPDolar += ($data[$i]->articulo[0]->Precio*$data[$i]->Cantidad);
                }
                }

                for ($i = 0; $i < count($data); $i++) {
                if(str_contains($data[$i]->articulo[0]->Moneda, "Pesos")){
                $cantartpeso = $cantartdolar+$data[$i]->Cantidad;
                $sumaPPeso += ($data[$i]->articulo[0]->Precio*$data[$i]->Cantidad);
                }
                }


                    ?>
            </div><br>
            @if($cantartdolar != 0)
            <div class="row justify-content-between">
                <div>{{__('Articulos')}} dlls({{$cantartdolar}}):</div>

                <div>$ {{$sumaPDolar}} USD </div>
            </div>
            @endif
            @if($cantartpeso != 0)
            <div class="row justify-content-between">
                <div>{{__('Articulos pesos')}}({{$cantartpeso}}): </div>

                <div>$ {{$sumaPPeso}} MXN</div>
            </div>
            @endif
            <br>
            @isset($data[0]->articulo[0]->Periodo)
            <div class="row justify-content-between">
                <div>{{__('Envio')}}:</div>

                <div> {{__($data[0]->articulo[0]->Periodo)}} </div>
            </div>
            @endisset
            <hr>
            @if($cantartdolar != 0)
            <div class="row justify-content-between">
                <div>{{__('Total USD:')}} </div>

                <div>$ {{$sumaPDolar}}</div>
            </div>
            @endif
            @if($cantartpeso != 0)
            <div class="row justify-content-between">
                <div>{{__('Total MXN:')}} </div>

                <div>$ {{$sumaPPeso}}</div>
            </div>
            @endif
            <hr>
            <br><br>
            @isset($data[0]->Observaciones)
            <div class="row">
                {{__('Observaciones:')}}
            </div>
            <div class="row">
                {{$data[0]->Observaciones}}
            </div>
            @endisset

        </div>
        </div>

        </div>
    </div>
</div>
@else

                <br><div class=" rounded"
        style="color:#640d14;padding:20px;border: 1px solid #ee6b6e;background-color:#ffcbd1"
        role="alert">
        <div class="row">
            <div class="col-1"><i class="fas fa-times-circle fa-lg"></i></div>
            <div class="col-11">
                <center><b>{{__('No se encuentra el pedido, solicite ayuda a soporte')}}</b></center>
            </div>
        </div>
    </div>

@endif
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

@stop
