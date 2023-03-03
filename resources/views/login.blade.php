@extends('layouts.app')

@section('content')

<style>
    .box {
        background-color:#0F1934;
        border-radius: 0% 5% 5% 0%;
        -webkit-transition: background-color 2s ease-out;
  -moz-transition: background-color 2s ease-out;
  -o-transition: background-color 2s ease-out;
  transition: background-color 2s ease-out;
    }
    .box:hover {
  background-color: #0E7E2D;
  cursor: pointer;
}
</style>
<div class="container" >


    <div class="row" display="flex" height="100%" style="margin-right:-10%">
    <div class="col-sm-6" style="align-items: center; y justify-content: center; margin-right:-10%;background-image: url('/img/1260.jpg');background-position: center;border-radius: 5% 0% 0% 5%;">

    </div>
    <div class="col-sm-6 box" style="">
        <center>
        <div style="">
        <img src="/logo/grupo_urvina_logo.png" class="rounded" alt="" style="padding:10px;margin-top:50px;width:150px;background-color:white"> <img src="/logo/logo_coeli.png" class="rounded" alt="" style="padding:10px;margin-top:50px;width:150px;background-color:white">
        </div>
    </center>

        <div class="row justify-content-center" style="margin-top:-80px">
            <div class="col" >
                <div class="card" style="margin-top:20%;margin-bottom:20%">
                    <div class="card-header bg-dark text-white" ><center><b>{{ __('Acceso al sistema') }}</b></center></div>


                    <div class="card-body">
                        <form method="POST" action="{{route('validar-registro', app()->getLocale())}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="usuario" class="col-md-4 col-form-label text-md-end">{{ __('Usuario') }}</label>

                                <div class="">
                                    <input id="usuario" type="usuario" class="form-control @if(isset($msg))('email') is-invalid @endif" name="usuario" value="{{ old('usuario') }}" required autocomplete="email" autofocus>

                                    @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @if(isset($msg)) is-invalid @endif" name="password" required autocomplete="current-password">

                                    @if(isset($msg))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $msg }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recuerdame') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Entrar') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@endsection
