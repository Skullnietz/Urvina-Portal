
@extends('adminlte::page')

@section('title', __('Articulo'))

@section('right-sidebar')


    <div class="container">
        <center>
            <br>
            <h3>Contacto</h3>
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

@section('content_header')

<?php $ART = trim($desc->Articulo);
$change = $articulo[0]->Moneda;
$limite = $articulo[0]->Mensaje2;
 ?>
    <style>
        a {
            color: inherit;
            /* blue colors for links too */
            text-decoration: inherit;
            /* no underline */
        }
        .fcontainer {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-top: 56.25%;
            /* 16:9 Aspect Ratio */
        }

        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        #img-zoomer-box {
  width: 500px;
  height: auto;
  position: relative;
  margin-top: 10px;
}

#img-1 {
  height: auto;
}

#img-zoomer-box:hover, #img-zoomer-box:active {
  cursor: zoom-in;
  display: block;
}

#img-zoomer-box:hover #img-2, #img-zoomer-box:active #img-2 {
  opacity: 1;
}

#img-2 {
  width: 350px;
  height: 350px;
  background: url({{'/images/catalogo/' . $ART . '.jpg'}}) no-repeat #FFF;
  margin-left:-70%;
  margin-top:-50%;
  box-shadow: 0 5px 10px -2px rgba(0,0,0,0.3);
  pointer-events: none;
  position: absolute;
  opacity: 0;
  border: 4px solid whitesmoke;
  z-index: 99;
  border-radius: 100%;
  transition: opacity .2s;
}
@media (max-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */
#img-1{
    width:200px;
}
#img-2{
    display:none;
} }

@media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
    .table-art{
    margin-top:-45px
}
.main-card{
    margin-top:-25px
}
}
@media (max-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
    #img-1{
    width:200px;
}

#img-2{
    display:none;
}}
    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card main-card">
                    <div class="card-header bg-success mb-3">
                        <center>
                            <b><a href="#" onclick="goBack()" class="border rounded" >&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;</a>&nbsp;&nbsp;&nbsp; {{ __($desc->Descripcion1) }} </b>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <center>

                                    <?php if (file_exists(public_path() . '/images/catalogo/' . $ART . '.jpg')) {
                                        echo '<div id="img-zoomer-box" style="max-width:350px"><div id="img-2" ></div><img class="border rounded" id="img-1" src="/images/catalogo/' . $ART . '.jpg" alt="$ART"></div>';
                                    } else {
                                        echo '<img class="border rounded" id="img-1" src="/img/productos/default_product.png" alt="no img" style="max-width:350px">';
                                    }
                                    ?><br><br>
                                    <?php if (file_exists(public_path() . '/specs/specs/' . $ART . '.pdf')) {
                                        echo '<button class="btn btn-primary" data-toggle="modal" data-target="#specs"><i class="fas fa-file-alt fa-lg"></i> &nbsp; &nbsp;<b>'.__('Ficha Técnica').'</b> </button>
                                                                        <!-- Modal -->
                                    <div class="modal fade" id="specs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">'.__('Ficha Técnica').' &nbsp; &nbsp;| &nbsp; &nbsp; <b>'.$ART.'</b></h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body fcontainer">
                                                <iframe class="responsive-iframe" src="/specs/specs/'.$ART.'.pdf" frameborder="0" ></iframe>
                                            </div>
                                            <div class="modal-footer">
                                              <a href="/specs/specs/'.$ART.'.pdf" download="'.$ART.'.pdf" class="btn btn-success"><i class="fas fa-download"> &nbsp;</i>'.__('Descargar').'</a>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">'.__('Cerrar').'</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>';
                                    } else {
                                        echo '';
                                    } ?>

                                </center>

                            </div>
                            <div class="col-md-6 col-xs-12">
                                <table class="table table-sm table-striped rounded table-art" >

                                    <tr>
                                        <td class="border"><b>{{__('Articulo:')}}</b></td>
                                        <td class="border" style="text-align:right">{{ $desc->Articulo }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border"><b>{{__('Codigo:')}}</b></td>
                                        <td class="border" style="text-align:right">{{ $codigo->Codigo }}</td>
                                    </tr>
                                    @if (isset($articulo[0]->Existencia))
                                        <tr>
                                            <td class="border"><b>{{__('Disponible:')}}</b></td>
                                            <td class="border" style="text-align:right">
                                                @if ($articulo[0]->Unidad == 'pza' || $articulo[0]->Unidad == 'par')
                                                    {{ intval($articulo[0]->Existencia) }} {{ __($articulo[0]->Unidad) }}
                                                @else
                                                    {{ $articulo[0]->Existencia }} {{ __($articulo[0]->Unidad) }}
                                                @endif

                                            </td>
                                        </tr>

                                    @endif
                                    @if (isset($articulo[0]->Precio))
                                        <tr>
                                            <td class="border"><b>{{__('Precio:')}}</b></td>
                                            <td class="border" style="text-align:right">
                                                ${{ number_format($articulo[0]->Precio, 2, '.', '') }}
                                                {{ __($articulo[0]->Moneda) }}</td>
                                        </tr><br>
                                    @endif



                                </table>

                                @if (
                                    $articulo[0]->Mensaje2 == 'Este artículo No esta en su presupuesto' ||
                                        $articulo[0]->Presupuesto == 0 ||
                                        $articulo[0]->Presupuesto == null)
                                    <div class=" rounded"
                                        style="color:#640d14;padding:20px;border: 1px solid #ee6b6e;background-color:#ffcbd1"
                                        role="alert">
                                        <div class="row">
                                            <div class="col-1"><i class="fas fa-times-circle fa-lg"></i></div>
                                            <div class="col-11">
                                                <center><b>{{__('Este artículo no esta en su presupuesto')}}</b></center>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="rounded" style="background-color:red">
                                        <center>
                                            <h5 style="color:white">{{__('Presupuesto')}}</h5>
                                        </center>
                                    </div>
                                    <table class="table table-sm table-striped rounded">
                                        <tr>
                                            <td class="border"> <b>{{__('Lapso de entrega:')}}</b> </td>
                                            @if (isset($articulo[0]->Periodo))
                                                <td class="border" style="text-align:right">{{ __($articulo[0]->Periodo) }}
                                                </td>
                                            @else
                                                <td class="border" style="text-align:right">{{ __($articulo[0]->Perido) }}</td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td class="border"> <b>{{__('De:')}}</b> </td>
                                            <td class="border" style="text-align:right">{{$date1->format('l, j F Y')}}</td>

                                        </tr>
                                        <tr>
                                            <td class="border"> <b>{{__('A:')}}</b> </td>
                                            <td class="border" style="text-align:right">{{$date2->format('l, j F Y')}}</td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                        <div class="col-4 border rounded"
                                            style="text-align:center; background-color:#0F1934; color:white"> <b>
                                                {{__('Autorizado')}}</b></div>
                                        <div class="col-4 border rounded"
                                            style="text-align:center; background-color:#0F1934; color:white"> <b>
                                                {{__('Requerido')}}</b></div>
                                        <div class="col-4 border rounded"
                                            style="text-align:center; background-color:#0F1934; color:white"> <b>
                                                {{__('Restante')}}</b></div>
                                    </div>
                                    <?php
                                    if(count($articulo)>=2){

                                        if(isset($_SESSION["carritodll"])){
                                        $cantidad=0;
                                        foreach($_SESSION["carritodll"] as $indice=>$arreglo){
                                            if($arreglo["item"] == $ART){
                                                $cantidad = $cantidad+ $arreglo["cantidad"] ;
                                            }
                                        }
                                        $arreglo["cantidad"]=$cantidad ;

                                        }
                                        if(isset($_SESSION["carritopes"])){
                                        $cantidadpes=0;
                                        foreach($_SESSION["carritopes"] as $indice=>$arreglo){
                                            if($arreglo["item"] == $ART){
                                                $cantidadpes = $cantidadpes+ $arreglo["cantidad"] ;
                                            }
                                        }
                                        $arreglo["cantidad"]=$cantidadpes ;

                                        }

                                    }

                                ?>
                                    @if(count($articulo)>=2)
                                                <div class="row">
                                                    <div class="col-4 border rounded"
                                                        style="text-align:center; font-size:1.5em; color:blue"><b>
                                                            {{number_format( $articulo[0]->Limite) }}

                                                        </b></div>
                                                    <div class="col-4 border rounded"
                                                        style="text-align:center; font-size:1.5em; color:green"><b>
                                                            <?php


                                                            if (str_contains($change,'Dolares')){
                                                                if(isset($cantidad)){
                                                                    echo number_format($cantidad + $articulo[0]->Consumo);
                                                                }else{
                                                                    echo number_format($articulo[0]->Consumo);
                                                                }
                                                            }
                                                            if (str_contains($change,'Pesos')){
                                                                if(isset($cantidadpes)){
                                                                    echo number_format($cantidadpes + $articulo[0]->Consumo);
                                                                }else{
                                                                    echo number_format($articulo[0]->Consumo);
                                                                }
                                                            }
                                                            ?>
                                                            <?php
                                                             if(str_contains($limite,'Ha Llegado al Límite Presupuestado')){
                                                                echo number_format($articulo[0]->Consumo);
                                                             }
                                                            ?>




                                                        </b></div>
                                                    <div class="col-4 border rounded" style="text-align:center; font-size:1.5em"><b>
                                                        <?php
                                                        if (str_contains($change,'Dolares')){
                                                            if(isset($cantidad)){
                                                                echo $articulo[0]->Limite - ($cantidad + $articulo[0]->Consumo);
                                                            }else{
                                                                echo number_format($articulo[0]->Limite - $articulo[0]->Consumo);
                                                            }
                                                        }
                                                        if (str_contains($change,'Pesos')){
                                                            if(isset($cantidadpes)){
                                                                echo $articulo[0]->Limite - ($cantidad + $articulo[0]->Consumo);
                                                            }else{
                                                                echo number_format($articulo[0]->Limite - $articulo[0]->Consumo);
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                        if(str_contains($limite,'Ha Llegado al Límite Presupuestado')){
                                                           echo 0;
                                                        }
                                                       ?>




                                                        </b> </div>
                                                </div>
                                                <?php
                                                if(str_contains($limite,'Ha Llegado al Límite Presupuestado')){
                                                    echo '<br><div class=" rounded"
                                        style="color:#640d14;padding:20px;border: 1px solid #ee6b6e;background-color:#ffcbd1"
                                        role="alert">
                                        <div class="row">
                                            <div class="col-1"><i class="fas fa-times-circle fa-lg"></i></div>
                                            <div class="col-11">
                                                <center><b>'.__('Ha Llegado al Límite Presupuestado').'</b></center>
                                            </div>
                                        </div>
                                    </div>';
                                                 }
                                                 ?>
                                    @else
                                    <div class="row">
                                        <div class="col-4 border rounded"
                                            style="text-align:center; font-size:1.5em; color:blue"><b>
                                                {{number_format( $articulo[0]->Limite) }}

                                            </b></div>
                                        <div class="col-4 border rounded"
                                            style="text-align:center; font-size:1.5em; color:green"><b>
                                                @if(str_contains($change,'Dolares'))
                                                @if(isset($_SESSION['carritodll'][$ART]))
                                                {{ $_SESSION['carritodll'][$ART]["cantidad"]+$articulo[0]->Consumo}}
                                                @else
                                                {{ number_format($articulo[0]->Consumo) }}
                                                @endif
                                                @endif

                                                @if(str_contains($change,'Pesos'))
                                                @if(isset($_SESSION['carritopes'][$ART]))
                                                {{ $_SESSION['carritopes'][$ART]["cantidad"]}}
                                                @else
                                                {{ number_format($articulo[0]->Consumo) }}
                                                @endif
                                                @endif
                                                <?php
                                                        if(str_contains($limite,'Ha Llegado al Límite Presupuestado')){
                                                           echo number_format($articulo[0]->Consumo);
                                                        }
                                                       ?>
                                            </b></div>
                                        <div class="col-4 border rounded" style="text-align:center; font-size:1.5em"><b>

                                                @if(str_contains($change,'Dolares'))


                                                @if(isset($_SESSION['carritodll'][$ART]))
                                                {{$articulo[0]->Limite - ($_SESSION['carritodll'][$ART]["cantidad"] + $articulo[0]->Consumo)}}
                                                @else
                                                {{ number_format($articulo[0]->Limite-$articulo[0]->Consumo) }}
                                                @endif

                                                @endif



                                                @if(str_contains($change,'Pesos'))

                                                @if(isset($_SESSION['carritopes'][$ART]))

                                                {{$articulo[0]->Limite - $_SESSION['carritopes'][$ART]["cantidad"]}}
                                                @else
                                                {{ number_format($articulo[0]->Limite-$articulo[0]->Consumo) }}
                                                @endif

                                                @endif
                                                <?php
                                                        if(str_contains($limite,'Ha Llegado al Límite Presupuestado')){
                                                           echo 0;
                                                        }
                                                       ?>

                                            </b> </div>
                                    </div>
                                    <?php if(str_contains($limite,'Ha Llegado al Límite Presupuestado')){
                                        echo '<br><div class=" rounded"
                            style="color:#640d14;padding:20px;border: 1px solid #ee6b6e;background-color:#ffcbd1"
                            role="alert">
                            <div class="row">
                                <div class="col-1"><i class="fas fa-times-circle fa-lg"></i></div>
                                <div class="col-11">
                                    <center><b>'.__('Ha Llegado al Límite Presupuestado').'</b></center>
                                </div>
                            </div>
                        </div>';
                                     } ?>
                                    @endif



                                    <?php $fecha = new DateTime() ?>
                                    <form action="{{route('additem', app()->getLocale())}}" method="get">
                                        <input type="hidden" name="excedente" value="{{ $articulo[0]->Excedente }}">
                                        <input type="hidden" name="codigo" value="{{ $codigo->Codigo }}">
                                        <input type="hidden" name="desc" value="{{ __($desc->Descripcion1) }}">
                                        <input type="hidden" name="articulo" value="{{$ART}}">
                                        <input type="hidden" name="precio" value="{{number_format($articulo[0]->Precio, 2, '.', '')}}">
                                        <input type="hidden" name="unidad" value="{{$articulo[0]->Unidad}}">
                                        <input type="hidden" name="moneda" value="{{$articulo[0]->Moneda}}">
                                        <input type="hidden" name="autorizado" value="{{intval($articulo[0]->Limite)}}">
                                        <input type="hidden" name="requerido" value="{{intval($articulo[0]->Consumo)}}">
                                        <input type="hidden" name="restante" value="{{intval($articulo[0]->Limite-$articulo[0]->Consumo)}}">
                                        <input type="hidden" name="fecha" value="{{$fecha->format('d-m-Y h:i:s a')}}">
                                        @foreach ($articulo as $item)
                                        <input type="hidden" name="subcuenta" value="{{$item->Subcuenta}}">
                                        @endforeach



                                    @csrf
                                    @if(count($articulo)>=2)
                                    <div class="input-group input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-sm">{{__('Talla')}}</span>
                                        </div>
                                        <select name="talla" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                            <option value=""> {{__('Seleccione una talla')}} </option>
                                            @foreach ($articulo as $key)
                                            <option value="{{$key->Descripcion}}"> <b>{{$key->Descripcion}}</b> ({{number_format($key->Existencia)}} Disponibles)  </option>
                                            @endforeach
                                        </select>
                                      </div>
                                    @endif
                                    <b>{{__('Cantidad:')}}</b>
                                    <div  class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <input  id="itemnumber" class="input-group-text" id="inputGroup-sizing-default" type="number"
                                               name="cantidad" min="1" max="{{ intval($articulo[0]->Limite-$articulo[0]->Consumo) }}" value="1"  pattern="[1-9].{1,{{strlen(intval($articulo[0]->Limite))-1}}}" style="background-color:white; font-size:23px;">
                                        </div>
                                        <span style="background-color:#e9ecef; font-size:25px;" class="form-control form-control-lg"
                                            aria-describedby="inputGroup-sizing-default">{{ __($articulo[0]->Unidad) }}</span>
                                    </div><br>

                                    @if ($articulo[0]->Venta = 1)
                                        <center>
                                            <button type="submit" class="btn btn-success btn-lg"><i
                                                    class="fas fa-shopping-cart"></i> |
                                                {{__('Comprar')}}</button>
                                        </center>
                                    </form>
                                    @else
                                    <center>
                                        <button  class="btn btn-success btn-lg disabled"><i
                                                class="fas fa-shopping-cart"></i> |
                                            {{__('Comprar')}} </button>
                                        </form>
                                        </center>
                                    @endif
                                @endif




                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>
    //SCRIPT DE LUPA EN IMG
    let zoomer = function (){
  document.querySelector('#img-zoomer-box')
    .addEventListener('mousemove', function(e) {

    let original = document.querySelector('#img-1'),
        magnified = document.querySelector('#img-2'),
        style = magnified.style,
        x = e.pageX - this.offsetLeft,
        y = e.pageY - this.offsetTop,
        imgWidth = original.offsetWidth,
        imgHeight = original.offsetHeight,
        xperc = ((x/imgWidth) * 100),
        yperc = ((y/imgHeight) * 100);

    //lets user scroll past right edge of image
    if(x > (.01 * imgWidth)) {
      xperc += (.15 * xperc);
    };

    //lets user scroll past bottom edge of image
    if(y >= (.01 * imgHeight)) {
      yperc += (.15 * yperc);
    };

    style.backgroundPositionX = (xperc - 9) + '%';
    style.backgroundPositionY = (yperc - 9) + '%';

    style.left = (x - 180) + 'px';
    style.top = (y - 180) + 'px';

  }, false);
}();
</script>
<script>
    // SCRIPT DE INACTIVIDAD
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
