@extends('adminlte::page')

@section('title', 'Pedido')

@section('content_header')


<div class="container">
    <div class="row">
        <div class="col-6"><h1>Pedido <b> {{$data[0]->Pedido}}</b> | <b style="color:gray">#{{$id}}</b></h1></div>
        <div class="col-6"> <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
          </div></div>
    </div>
</div>

    <br>

@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 border-right" style="height:500px; overflow-x: auto;">

            @foreach ($data as $pedido)

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" >
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4"><?php if (file_exists(public_path() . '/images/catalogo/' . trim($pedido->Articulo) . '.jpg')) {
                        echo '<img width="190px" class="border rounded" id="img-1" src="/images/catalogo/' . trim($pedido->Articulo) . '.jpg" alt="$ART">';
                    } else {
                        echo '<img class="border rounded" id="img-1" src="/img/productos/default_product.png" alt="no img" style="width:190px">';
                    }
                    ?></div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="row">
                            <h5>{{$pedido->Descripcion}}</h5>
                        </div>
                        <div class="row">
                            <h6>{{$pedido->Codigo}}</h6>
                        </div>
                        <div class="row"></div>
                        <div class="row">@if ($pedido->Unidad == 'pza' || $pedido->Unidad == 'par')
                            <div class="row"><span class="badge badge-secondary"><h5>{{intval($pedido->Cantidad)}} {{$pedido->Unidad}}</h5></span></div>
                            @else
                            <div class="row"><span class="badge badge-secondary"><h5>{{$pedido->Cantidad}} {{$pedido->Unidad}}</h5></span></div>
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

            <div class="row"><h5><b>Detalle de pedido:</b></h5></div>
            <div class="row">{{$data[0]->CFecha->format('l, j F Y')}} &nbsp;| &nbsp;<b style="color:gray">#{{$id}}</b></div>
            <hr>
            <div class="row justify-content-between">
                <div>Departamento: </div>

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
                <div>Articulos dlls({{$cantartdolar}})</div>

                <div>$ {{$sumaPDolar}} USD</div>
            </div>
            @endif
            @if($cantartpeso != 0)
            <div class="row justify-content-between">
                <div>Articulos pesos({{$cantartpeso}})</div>

                <div>$ {{$sumaPPeso}} MXN</div>
            </div>
            @endif
            <br>
            <div class="row justify-content-between">
                <div>Envio</div>

                <div>{{$data[0]->articulo[0]->Periodo}}</div>
            </div>
            <hr>
            @if($cantartdolar != 0)
            <div class="row justify-content-between">
                <div>Total USD</div>

                <div>$ {{$sumaPDolar}}</div>
            </div>
            @endif
            @if($cantartpeso != 0)
            <div class="row justify-content-between">
                <div>Total MXN</div>

                <div>$ {{$sumaPPeso}}</div>
            </div>
            @endif
            <hr>
            <br><br>
            <div class="row">
                Observaciones
            </div>
            <div class="row">
                {{$data[0]->Observaciones}}
            </div>

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

@stop
