@extends('adminlte::page')

@section('title', __('Carrito'))

@section('content_header')

<style>
    @media (min-width:480px)  { /* smartphones, Android phones, landscape iPhone */
    .flag{
        width:20px;
    }
    .ftable {
       display: block;
       overflow-x: auto;
     }
 }
 @media (min-width:801px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
    .flag{
        width:30px;
    }
    .ftable {
       display: block;
       overflow-x: auto;
     }

}
</style>

<div class="container">
    <div class="row">
        <div class="col-6"><h1>{{__('Carrito')}}</h1></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <div class="container">
        <div class="row">
            <div class="col">
                @if(isset($_SESSION["carritopes"]))
                <div class="card">
                    <div class="card-header" style="background-color:#0F1934; text-align:center; color:white;">
                        <b>{{__('Artículos en Pesos')}}</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Imagen')}}</b> </div>
                            <div class="col-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Artículo')}}</b> </div>
                            <div class="col-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Código')}}</b> </div>
                            <div class="col-4 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Descripción')}}</b> </div>
                            <div class="col-1 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Cant.')}}</b> </div>
                            <div class="col-1 rounded border-right border-left"></div>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php $numitem = 0;?>
                        @foreach ($_SESSION["carritopes"] as $indice=>$arreglop)
                        <?php $numitem++;?>
                        <div class="row">
                            <div class="col-2 border rounded-left" style="text-align:center; padding:10px"><?php if (file_exists(public_path() . '/images/catalogo/' . $arreglop["articulo"] . '.jpg')) {
                                echo '<img class="border rounded" id="img-'.$numitem.'" src="/images/catalogo/' . $arreglop["articulo"] . '.jpg" alt="$ART"style="max-height:80px">';
                            } else {
                                echo '<img class="border rounded" src="/img/productos/default_product.png" alt="no img" style="max-height:80px">';
                            }
                            ?> </div>
                            <div class="col-2 border rounded-left" style="text-align:center; padding:10px"> {{$arreglop["articulo"]}}</div>
                            <div class="col-2 border" style="text-align:center; padding:10px">{{$arreglop["codigo"]}}</div>
                            <div class="col-4 border" style="text-align:center; padding:10px"><small><b>{{__($arreglop["desc"])}}</b></small>
                            </div>
                            <div class="col-1 border" style="text-align:center; padding:10px"><input id="cantpes{{$numitem}}"
                                    style="text-align:center" @if(isset($arreglop["talla"])) class="form-control disabled" disabled title="{{__('Debe eliminar este item para cambiar cantidad')}}" @else class="form-control" @endif type="number"  min="1"  @if($arreglop["excedente"]==0) max="{{$arreglop["autorizado"]}}" @endif value="{{$arreglop["cantidad"]}}"
                                    onchange="cambiocantp{{$numitem}}()" onkeyup="cambiocantp{{$numitem}}()" required>
                            </div>
                            <input id="artpes{{$numitem}}" type="hidden" value="{{$arreglop["precio"]}}">
                            <div class="col-1 border rounded-right" style="text-align:center; padding:10px">

                                <form action="{{route('quititem', app()->getLocale())}}" method="get">
                                    @csrf
                                <input type="hidden" name="qarticulo" value="{{$arreglop["articulo"]}}">
                                <input type="hidden" name="qtipo" value="{{$arreglop["moneda"]}}">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                </form>

                            </div>

                                    <input onload="cambiocantp{{$numitem}}()" class="totalarts" id="totalartpes{{$numitem}}" value=""
                                type="hidden">
                        </div>

                        @endforeach




                    </div>
                    <hr>

                    <div class="row" style="">
                        <div class="col-6"></div>
                        <div class="col-3" style="text-align:left; margin-left:10px; margin-top:10px"><label
                                class="">{{__('Importe Total Pesos:')}} <b style="color:blue"></b></label>
                        </div>
                        <div class="col-2" style="text-align:right; margin-right:10px">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span style="font-weight:bold; color:blue" class="input-group-text">$</span>
                                </div>
                                <input id="totalpes" type="number" style="font-weight:bold; color:blue" value="249.23"
                                 class="form-control"
                                    aria-label="Amount (to the nearest dollar)" disabled>

                            </div>
                        </div>

                    </div>





                </div>
            </div>
        </div>
        <!-- Modal Pesos -->
        <div class="modal fade" id="PesosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#0E7E2D">
                        <center>
                            <h5 class="modal-title" id="exampleModalLabel" style="color:white">{{__('Confirmando compra')}}...</h5>
                        </center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('confpes', app()->getLocale())}}" method="get">
                        <div class="row">
                            <div class="col"><b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><i
                                                    class="fas fa-chart-area"></i>&nbsp;| {{__('Departamento')}}</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="departamento">
                                            @foreach ($departamentos as $departamento)
                                            <option value="{{$departamento->Departamento}}">{{$departamento->Nombre}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </b></div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i
                                            class="fas fa-users-cog"></i>&nbsp;| {{__('Equipo/Trabajo')}}</label>
                                </div>
                                @if(count($equipos) == 0)
                                <input class="form-control" name="referencia" type="text">
                                @else
                                <select class="custom-select" id="inputGroupSelect01" name="referencia"  required>
                                    <option value="">{{__('Selecciona un equipo')}}...</option>
                                    @foreach ($equipos as $equipo)
                                    <option value="{{$equipo->Equipo}}">{{$equipo->Equipo}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>


                        <input class="form-control" name="observaciones" type="hidden" value="Observaciones">
                        <input class="form-control" name="planta" type="hidden" value="{{trim($_SESSION['usuario']->Planta)}}">
                        <input class="form-control" name="moneda" type="hidden" value="Pesos">



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Confirmar')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid gap-2 col-12 mx-auto">
  <button data-toggle="modal" data-target="#PesosModal" class="btn btn-primary" type="button">{{__('Continuar con la compra')}}</button>
  </div>
        </div><br>
        @endif
        @if(isset($_SESSION["carritodll"]))
        <div class="row">
            <div class="col">
                <div class="">
                <div class="card">
                    <div class="card-header" style="background-color:#0F1934; text-align:center; color:white;">
                        <b>{{__('Artículos en Dolares')}}</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Imagen')}}</b> </div>
                            <div class="col-md-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Artículo')}}</b> </div>
                            <div class="col-md-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Código')}}</b> </div>
                            <div class="col-md-4 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Descripción')}}</b> </div>
                            <div class="col-md-1 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Cant.')}}</b> </div>
                            <div class="col-md-1 rounded border-right border-left"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php $numart = 0;?>

                        @foreach ($_SESSION["carritodll"] as $indice=>$arreglo)
                        <?php $numart++;?>
                        <div class="row">
                            <div class="col-md-2 border rounded-left" style="text-align:center; padding:10px"><?php if (file_exists(public_path() . '/images/catalogo/' . $arreglo["articulo"] . '.jpg')) {
                                echo '<img class="border rounded" id="img-'.$numart.'" src="/images/catalogo/' . $arreglo["articulo"] . '.jpg" alt="$ART"style="max-height:80px">';
                            } else {
                                echo '<img class="border rounded" src="/img/productos/default_product.png" alt="no img" style="max-height:80px">';
                            }
                            ?> </div>
                            <div class="col-md-2 border rounded-left" style="text-align:center; padding:10px;">{{$arreglo["articulo"]}}</div>
                            <div class="col-md-2 border" style="text-align:center; padding:10px;">{{$arreglo["codigo"]}}</div>
                            <div class="col-md-4 border" style="text-align:center; padding:10px;"><small><b>{{$arreglo["desc"]}}</b></small>
                            </div>
                            <div class="col-md-1 border" style="text-align:center; padding:10px;">
                                <input @if(isset($arreglo["talla"])) class="form-control disabled" disabled title="Debe eliminar este item para cambiar cantidad" @else class="form-control" @endif id="cantdol{{$numart}}" style="text-align:center" class="form-control" type="number"
                                    min="1" @if($arreglo["excedente"]==0) max="{{$arreglo["autorizado"]}}" @endif value="{{$arreglo["cantidad"]}}" onchange="cambiocantd{{$numart}}()" onkeyup="cambiocantd{{$numart}}()" required>
                                <input id="artdol{{$numart}}" type="hidden" value="{{$arreglo["precio"]}}">
                            </div>
                            <div class="col-md-1 border rounded-right" style="text-align:center; padding:10px;">
                                <form action="{{route('quititem', app()->getLocale())}}" method="get">
                                    @csrf
                                <input type="hidden" name="qarticulo" value="{{$arreglo["articulo"]}}">
                                <input type="hidden" name="qtipo" value="{{$arreglo["moneda"]}}">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                </form>

                                </div>

                            <input onload="cambiocantd{{$numart}}()" class="totalarts" id="totalart{{$numart}}" value=""
                                type="hidden">

                        </div>
                        @endforeach



                    </div>
                    <hr>



                    <div class="row" style="">
                        <div class="col-md-6"></div>
                        <div class="col-md-3" style="text-align:left; margin-left:10px; margin-top:10px"><label
                                class="">{{__('Importe Total Dolares:')}} <b style="color:blue"></b></label>
                        </div>
                        <div class="col-md-2" style="text-align:right; margin-right:10px">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span style="font-weight:bold; color:blue" class="input-group-text">$</span>
                                </div>
                                <input id="totaldol" type="number" style="font-weight:bold; color:blue" value=""
                                    class="form-control" aria-label="Amount (to the nearest dollar)" disabled>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </div>
        </div>
        <!-- Modal Dolares -->
        <div class="modal fade" id="DolarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#0E7E2D">
                        <center>
                            <h5 class="modal-title" id="exampleModalLabel" style="color:white">{{__('Confirmando compra')}}...</h5>
                        </center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('confdll', app()->getLocale())}}" method="get">
                        <div class="row">
                            <div class="col"><b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><i
                                                    class="fas fa-chart-area"></i>&nbsp;| {{__('Departamento')}}</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="departamento" required>
                                            @foreach ($departamentos as $departamento)
                                            <option value="{{$departamento->Departamento}}">{{$departamento->Nombre}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </b></div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i
                                            class="fas fa-users-cog"></i>&nbsp;| {{__('Equipo/Trabajo')}}</label>
                                </div>
                                @if(count($equipos) == 0)
                                <input name="referencia" class="form-control" type="text" required>
                                @else
                                <select class="custom-select" id="inputGroupSelect01" name="referencia"  required>
                                    <option value="">{{__('Selecciona un equipo')}}...</option>
                                    @foreach ($equipos as $equipo)
                                    <option value="{{$equipo->Equipo}}">{{$equipo->Equipo}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>


                        <input class="form-control" name="observaciones" type="hidden" value="Observaciones" required>
                        <input class="form-control" name="planta" type="hidden" value="{{trim($_SESSION['usuario']->Planta)}}" required>
                        <input class="form-control" name="moneda" type="hidden" value="Dolares" required>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>
                        <button type="submit" href="{{route('postcompra', [app()->getLocale()])}}" type="button" class="btn btn-primary">{{__('Confirmar')}}</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid gap-2 col-12 mx-auto">
  <button data-toggle="modal" data-target="#DolarModal" class="btn btn-primary" type="button">{{__('Continuar con la compra')}}</button>
  </div>
        </div><br>
        @endif
        <script>
            @if(isset($_SESSION["carritopes"]))
            <?php $artnumbpesos=0; ?>
            @foreach ($_SESSION["carritopes"] as $indicepesosc=>$arreglopesosc)
            <?php $artnumbpesos++; ?>
            function cambiocantp{{$artnumbpesos}}(){
            <?php $artnumbpesosc=0; ?>
            @foreach ($_SESSION["carritopes"] as $indicepesosco=>$arreglopesosco)
            <?php $artnumbpesosc++; ?>
                subtotalarticulop{{$artnumbpesosc}}();
                @endforeach
            }
            @endforeach
            @endif
        </script>
        <script>
            @if(isset($_SESSION["carritodll"]))
            <?php $itemnumbd=0; ?>
            @foreach ($_SESSION["carritodll"] as $indicedolares=>$arreglodolares)
            <?php $itemnumbd++; ?>
            function cambiocantd{{$itemnumbd}}() {
                <?php $itemnumbdo=0; ?>
                @foreach ($_SESSION["carritodll"] as $indicedolares=>$arreglodolaresc)
                <?php $itemnumbdo++; ?>
                subtotalarticulod{{$itemnumbdo}}();
                @endforeach
            }
            @endforeach
            @endif
        </script>
        <script>
            @if(isset($_SESSION["carritopes"]))
            <?php $artnumbpe=0; ?>
            @foreach ($_SESSION["carritopes"] as $indicepesos=>$arreglopesos)
            <?php $artnumbpe++; ?>

            function subtotalarticulop{{$artnumbpe}}() {
                var artipes{{$artnumbpe}} = document.getElementById("artpes{{$artnumbpe}}").value;
                var articulopes{{$artnumbpe}} = parseFloat(artipes{{$artnumbpe}}).toFixed(2);
                var cantipes{{$artnumbpe}} = document.getElementById("cantpes{{$artnumbpe}}").value;
                var cantidadpes{{$artnumbpe}} = parseFloat(cantipes{{$artnumbpe}}).toFixed(2);
                var multi{{$artnumbpe}} = cantidadpes{{$artnumbpe}} * articulopes{{$artnumbpe}};
                document.getElementById("totalartpes{{$artnumbpe}}").value = multi{{$artnumbpe}}.toFixed(2);
                // Suma de los totales Dolares
                <?php $artnumbpeso=0; ?>
                @foreach ($_SESSION["carritopes"] as $indicepesosca=>$arreglopesosca)
                <?php $artnumbpeso++; ?>
                var subtotal{{$artnumbpeso}} = document.getElementById("totalartpes{{$artnumbpe}}").value;
                @endforeach
                var restotalpes = (0 <?php $artnumbpes=0; ?>@foreach ($_SESSION["carritopes"] as $indicepesosc=>$arreglopesosc)
                <?php $artnumbpes++; ?>
                + Number(subtotal{{$artnumbpes}})
                @endforeach);
                document.getElementById("totalpes").value = restotalpes;
            }
            @endforeach
            @endif

        </script>
        <script>
            @if(isset($_SESSION["carritodll"]))
            <?php $itemnumdo=0; ?>
            @foreach ($_SESSION["carritodll"] as $indicedola=>$arreglodola)
            <?php $itemnumdo++; ?>
            // Subtotal del articulo {{$itemnumdo}} (Dolares)
            function subtotalarticulod{{$itemnumdo}}(){
                var artidol{{$itemnumdo}} = document.getElementById("artdol{{$itemnumdo}}").value;
                var articulodol{{$itemnumdo}} = parseFloat(artidol{{$itemnumdo}}).toFixed(2);
                var cantidol{{$itemnumdo}} = document.getElementById("cantdol{{$itemnumdo}}").value;
                var cantidaddol{{$itemnumdo}} = parseFloat(cantidol{{$itemnumdo}}).toFixed(2);
                var multi{{$itemnumdo}} = cantidaddol{{$itemnumdo}} * articulodol{{$itemnumdo}};
                document.getElementById("totalart{{$itemnumdo}}").value = multi{{$itemnumdo}}.toFixed(2);

                // Suma de los totales Dolares
                <?php $itemnumdol=0; ?>
                @foreach ($_SESSION["carritodll"] as $indicedolar=>$arreglodolar)
                <?php $itemnumdol++; ?>
                var subtotal{{$itemnumdol}} = document.getElementById("totalart{{$itemnumdol}}").value;
                @endforeach


                var restotaldol = (0
                <?php $itemnumdola=0; ?>
                    @foreach ($_SESSION["carritodll"] as $indicedolare=>$arreglodolare)
                    <?php $itemnumdola++; ?>
                    + Number(subtotal{{$itemnumdola}})
                    @endforeach
                    );
                document.getElementById("totaldol").value = restotaldol;
            }
            @endforeach

            @endif
        </script>
        <script>
            function allEvents() {

                @if(isset($_SESSION["carritopes"]))
                //Subtotales por Producto Pesos
                <?php $artnum=0; ?>
                @foreach ($_SESSION["carritopes"] as $indicepes=>$arreglopes)
                <?php $artnum++; ?>
                cambiocantp{{$artnum}}();
                var subtotalpes{{$artnum}} = document.getElementById("totalartpes{{$artnum}}").value;
                @endforeach

                // Suma de los totales Pesos
                <?php $artnump=0; ?>
                var restotalpes = (0
                    @foreach ($_SESSION["carritopes"] as $indicepeso=>$arreglopeso)
                    <?php $artnump++; ?>
                    + Number(subtotalpes{{$artnump}}) @endforeach );
                document.getElementById("totalpes").value = restotalpes.toFixed(2);
                @endif

                @if(isset($_SESSION["carritodll"]))



                //Subtotales por Producto Dolares
                <?php $itemnum=0; ?>
                @foreach ($_SESSION["carritodll"] as $indicedll=>$arreglodll)
                <?php $itemnum++; ?>
                cambiocantd{{$itemnum}}();
                var subtotal{{$itemnum}} = document.getElementById("totalart{{$itemnum}}").value;
                @endforeach

                // Suma de los totales Dolares
                var restotaldol = ( 0 <?php $itemnumd=0; ?>  @foreach ($_SESSION["carritodll"] as $indicedol=>$arreglodol)<?php $itemnumd++; ?>
                  + Number(subtotal{{$itemnumd}})
                 @endforeach);
                document.getElementById("totaldol").value = restotaldol.toFixed(2);
                @endif

            }
            window.onload = allEvents;
        </script>
        @if(isset($_SESSION['carritodll']) || isset($_SESSION['carritopes']))
        @else
        <div class=" rounded"
                                        style="color:#0F1934;padding:20px;border: 1px solid #63c5da;background-color:#81EEFD"
                                        role="alert">
                                        <div class="row">
                                            <div class="col-1"><i class="fas fa-info-circle fa-lg"></i></div>
                                            <div class="col-11">
                                                <b>{{__('Aún no hay articulos en su carrito de compra')}}</b>
                                            </div>
                                        </div>


                                    </div>

        @endif




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
        function cambiocantp() {
            document.getElementById("artpes").value;
            document.getElementById("cantpes").value;
        }


    </script>





@stop
