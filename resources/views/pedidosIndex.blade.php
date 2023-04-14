@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
<div class="container">
    <div class="row">
        <div class="col-6"><h1>Mis Pedidos</h1></div>
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
    @foreach ($data as $pedido)
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                {{$pedido->Pedido}} | {{$pedido->Fecha}}
            </div>
            <div class="card-body">
                    <div class="row">
                    <div class="col-3">Fotos Pedido</div>
                    <div class="col-6">
                        @foreach ($pedido->desc as $descpedido)
                        {{$descpedido->Pedido}}
                        @endforeach
                    </div>
                    <div class="col-3"><a class="btn btn-primary">Ver Pedido</a></div>
                </div>

            </div>
        </div>
    </div>
    </div>
    @endforeach
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
