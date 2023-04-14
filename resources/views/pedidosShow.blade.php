@extends('adminlte::page')

@section('title', 'Pedido')

@section('content_header')
<div class="container">
    <div class="row">
        <div class="col-6"><h1>Pedido</h1></div>
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



<div class="jumbotron">
    <h1 class="display-4">Bienvenido de vuelta!</h1>
    <p class="lead">Te damos la bienvenida a la actualización del Portal Urvina. Sientase libre de utilizar el portal y realizar sus compras...</p>
    <hr class="my-4">
    <p>Puede explorar nuestros productos en el apartado de Catalogo</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('catalogo'), app()->getLocale()}}" role="button">Ir al Catalogo</a>
    </p>
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
