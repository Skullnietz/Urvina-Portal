@extends('adminlte::page')

@section('title', __('Carrito'))

@section('content_header')

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
                @if(isset($_SESSION["carrito"]))
                <div class="card">
                    <div class="card-header" style="background-color:#0F1934; text-align:center; color:white;">
                        <b>{{__('Artículos en Pesos')}}</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Artículo')}}</b> </div>
                            <div class="col-3 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Código')}}</b> </div>
                            <div class="col-4 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Descripción')}}</b> </div>
                            <div class="col-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Cant.')}}</b> </div>
                            <div class="col-1 rounded border-right border-left"></div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-2 border rounded-left" style="text-align:center; padding:10px">SEF1-013</div>
                            <div class="col-3 border" style="text-align:center; padding:10px">0032-0012,0032-D36P</div>
                            <div class="col-4 border" style="text-align:center; padding:10px">MANDIL DE MEZCLILLA REFORZADO
                            </div>
                            <div class="col-2 border" style="text-align:center; padding:10px"><input id="cantpes1"
                                    style="text-align:center" class="form-control" type="number" min="1" max="" value="5"
                                    onchange="cambiocantp1()" onkeyup="cambiocantp1()">
                            </div>
                            <input id="artpes1" type="hidden" value="22.2">
                            <div class="col-1 border rounded-right" style="text-align:center; padding:10px"><button
                                    class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                    <input onload="cambiocantp1()" class="totalarts" id="totalartpes1" value=""
                                type="hidden">
                        </div>
                        <div class="row">
                            <div class="col-2 border rounded-left" style="text-align:center; padding:10px">SEF1-013</div>
                            <div class="col-3 border" style="text-align:center; padding:10px">0032-0012,0032-D36P</div>
                            <div class="col-4 border" style="text-align:center; padding:10px">MANDIL DE MEZCLILLA REFORZADO
                            </div>
                            <div class="col-2 border" style="text-align:center; padding:10px"><input id="cantpes2"
                                    style="text-align:center" class="form-control" type="number" value="5" min="1" max=""
                                    onchange="cambiocantp2()" onkeyup="cambiocantp2()">
                            </div>
                            <input id="artpes2" type="hidden" value="22.2">
                            <div class="col-1 border rounded-right" style="text-align:center; padding:10px"><button
                                    class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                    <input onload="cambiocantp2()" class="totalarts" id="totalartpes2" value=""
                                type="hidden">
                        </div>



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
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="background-color:#0F1934; text-align:center; color:white;">
                        <b>{{__('Artículos en Dolares')}}</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Artículo')}}</b> </div>
                            <div class="col-3 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Código')}}</b> </div>
                            <div class="col-4 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Descripción')}}</b> </div>
                            <div class="col-2 rounded border-right border-left"
                                style="text-align:center; background-color:#0E7E2D; color:white"><b>{{__('Cant.')}}</b> </div>
                            <div class="col-1 rounded border-right border-left"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 border rounded-left" style="text-align:center; padding:10px;">SGG2-037</div>
                            <div class="col-3 border" style="text-align:center; padding:10px;">D382-1CHW</div>
                            <div class="col-4 border" style="text-align:center; padding:10px;">GUANTE DE NYLON REC. DE
                                NITRILO EN PALMA Y DORSO MOD.1400 SAFE FIT [6]
                            </div>
                            <div class="col-2 border" style="text-align:center; padding:10px;">
                                <input id="cantdol1" style="text-align:center" class="form-control" type="number"
                                    min="1" max="" value="1" onchange="cambiocantd1()" onkeyup="cambiocantd1()">
                                <input id="artdol1" type="hidden" value="22.2">
                            </div>
                            <div class="col-1 border rounded-right" style="text-align:center; padding:10px;"><button
                                    class="btn btn-danger"><i class="fas fa-times"></i></button></div>

                            <input onload="cambiocantd1()" class="totalarts" id="totalart1" value=""
                                type="hidden">

                        </div>

                        <div class="row">
                            <div class="col-2 border rounded-left" style="text-align:center; padding:10px;">SGG2-037</div>
                            <div class="col-3 border" style="text-align:center; padding:10px;">D382-1CHW</div>
                            <div class="col-4 border" style="text-align:center; padding:10px;">GUANTE DE NYLON REC. DE
                                NITRILO EN PALMA Y DORSO MOD.1400 SAFE FIT [6]
                            </div>
                            <div class="col-2 border" style="text-align:center; padding:10px;">
                                <input id="cantdol2" style="text-align:center" class="form-control" type="number"
                                    min="1" max="" value="1" onchange="cambiocantd2()" onkeyup="cambiocantd2()">
                                <input id="artdol2" type="hidden" value="22.2">
                            </div>
                            <div class="col-1 border rounded-right" style="text-align:center; padding:10px;"><button
                                    class="btn btn-danger"><i class="fas fa-times"></i></button></div>

                            <input onload="cambiocantd2()" class="totalarts" id="totalart2" value=""
                                type="hidden">
                        </div>
                    </div>
                    <hr>



                    <div class="row" style="">
                        <div class="col-6"></div>
                        <div class="col-3" style="text-align:left; margin-left:10px; margin-top:10px"><label
                                class="">{{__('Importe Total Dolares:')}} <b style="color:blue"></b></label>
                        </div>
                        <div class="col-2" style="text-align:right; margin-right:10px">
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
        <script>
            function cambiocantp1(){
                subtotalarticulop1();
                subtotalarticulop2();
            }
            function cambiocantp2(){
                subtotalarticulop1();
                subtotalarticulop2();
            }
        </script>
        <script>
            function cambiocantd1() {
                subtotalarticulod1();
                subtotalarticulod2();
            }
            function cambiocantd2() {
                subtotalarticulod1();
                subtotalarticulod2();
            }
        </script>
        <script>
            function subtotalarticulop1() {
                var artipes1 = document.getElementById("artpes1").value;
                var articulopes1 = parseFloat(artipes1).toFixed(2);
                var cantipes1 = document.getElementById("cantpes1").value;
                var cantidadpes1 = parseFloat(cantipes1).toFixed(2);
                var multi1 = cantidadpes1 * articulopes1;
                document.getElementById("totalartpes1").value = multi1.toFixed(2);
                // Suma de los totales Dolares
                var subtotal1 = document.getElementById("totalartpes1").value;
                var subtotal2 = document.getElementById("totalartpes2").value;
                var restotalpes = (Number(subtotal1) + Number(subtotal2));
                document.getElementById("totalpes").value = restotalpes;
            }
            function subtotalarticulop2() {
                var artipes2 = document.getElementById("artpes2").value;
                var articulopes2 = parseFloat(artipes2).toFixed(2);
                var cantipes2 = document.getElementById("cantpes2").value;
                var cantidadpes2 = parseFloat(cantipes2).toFixed(2);
                var multi2 = cantidadpes2 * articulopes2;
                document.getElementById("totalartpes2").value = multi2.toFixed(2);
                // Suma de los totales Dolares
                var subtotal1 = document.getElementById("totalartpes1").value;
                var subtotal2 = document.getElementById("totalartpes2").value;
                var restotalpes = (Number(subtotal1) + Number(subtotal2));
                document.getElementById("totalpes").value = restotalpes;
            }
        </script>
        <script>
            // Subtotal del articulo 1 (Dolares)
            function subtotalarticulod1(){
                var artidol1 = document.getElementById("artdol1").value;
                var articulodol1 = parseFloat(artidol1).toFixed(2);
                var cantidol1 = document.getElementById("cantdol1").value;
                var cantidaddol1 = parseFloat(cantidol1).toFixed(2);
                var multi1 = cantidaddol1 * articulodol1;
                document.getElementById("totalart1").value = multi1.toFixed(2);
                // Suma de los totales Dolares
                var subtotal1 = document.getElementById("totalart1").value;
                var subtotal2 = document.getElementById("totalart2").value;
                var restotaldol = (Number(subtotal1) + Number(subtotal2));
                document.getElementById("totaldol").value = restotaldol;
            }
            // Subtotal del articulo 2 (Dolares)
            function subtotalarticulod2(){
                var artidol2 = document.getElementById("artdol2").value;
                var articulodol2 = parseFloat(artidol2).toFixed(2);
                var cantidol2 = document.getElementById("cantdol2").value;
                var cantidaddol2 = parseFloat(cantidol2).toFixed(2);
                var multi2 = cantidaddol2 * articulodol2;
                document.getElementById("totalart2").value = multi2.toFixed(2);
                // Suma de los totales Dolares
                var subtotal1 = document.getElementById("totalart1").value;
                var subtotal2 = document.getElementById("totalart2").value;
                var restotaldol = (Number(subtotal1) + Number(subtotal2));
                document.getElementById("totaldol").value = restotaldol.toFixed(2);
            }
        </script>
        <script>
            function allEvents() {
                //Subtotales por Producto Pesos
                cambiocantp1();
                cambiocantp2();

                // Suma de los totales Pesos
                var subtotalpes1 = document.getElementById("totalartpes1").value;
                var subtotalpes2 = document.getElementById("totalartpes2").value;
                var restotalpes = (Number(subtotalpes1) + Number(subtotalpes2));
                document.getElementById("totalpes").value = restotalpes.toFixed(2);

                // Suma de los totales Dolares
                var subtotal1 = document.getElementById("totalart1").value;
                var subtotal2 = document.getElementById("totalart2").value;
                var restotaldol = (Number(subtotal1) + Number(subtotal2));
                document.getElementById("totaldol").value = restotaldol.toFixed(2);

                //Subtotales por Producto Dolares
                cambiocantd1();
                cambiocantd2();

            }

            window.onload = allEvents;
        </script>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4"><a href="" style="float:right" class="btn btn-lg btn-primary"
                    data-toggle="modal" data-target="#exampleModal"> {{__('Continuar con la compra')}}</a></div>

        </div><br>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <div class="row">
                            <div class="col"><b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><i
                                                    class="fas fa-chart-area"></i>&nbsp;| {{__('Departamento')}}</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
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
                                <input class="form-control" type="text">
                                @else
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>{{__('Selecciona un equipo')}}...</option>
                                    @foreach ($equipos as $equipo)
                                    <option value="{{$equipo->Equipo}}">{{$equipo->Equipo}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i
                                            class="fas fa-truck"></i>&nbsp;| {{__('Envio')}}</label>
                                </div>
                                <input class="form-control" type="number">
                            </div>
                        </div>
                        <hr>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>
                        <a href="{{route('postcompra', [app()->getLocale()])}}" type="button" class="btn btn-primary">{{__('Confirmar')}}</a>
                    </div>
                </div>
            </div>
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
