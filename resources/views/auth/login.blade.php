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
    <div class="col-sm-6" style="align-items: center; y justify-content: center; margin-right:-10%;background-image: url('img/1260.jpg');background-position: center;border-radius: 5% 0% 0% 5%;">

    </div>
    <div class="col-sm-6 box" style="">
        <div class="row justify-content-center">
            <div class="col" >
                <div class="card" style="margin-top:20%;margin-bottom:20%">
                    <div class="card-header" ><b>{{ __('Acceso al sistema') }}</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>

                                <div class="">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
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
