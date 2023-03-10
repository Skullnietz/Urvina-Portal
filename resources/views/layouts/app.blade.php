<!doctype html>
<style>
    @media (max-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */

.enflag{
    margin-right:-150px;
    margin-top:-60px;
}
.esflag{
    margin-left:-150px;
    margin-top:-50px;
}
 }
@media (max-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */

.enflag{
    margin-left:-150px;
    margin-top:-60px;

}
.esflag{
    margin-right:-150px;
    margin-top:-50px;
}
}

</style>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>URVINA</title>

    <!-- Scripts -->
    <script src="js/bootstrap.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="/favicons/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body style="background-color:#CCC">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="navbar-collapse  w-100 dual-collapse2 order-1 order-md-0">
                <ul class="navbar-nav ml-auto text-center flags esflag">
                    <li class="nav-item">
                        <a href="{{route(Route::currentRouteName(), 'es')}}">
                            <img src="/icons/es.svg" style="width:50px" alt="ES">
                          </a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto my-2 order-0 order-md-1 position-relative">
                <a class="mx-auto" href="#">
                    <img class="rounded" style="background-color:white; padding:10px" src="/logo/grupo_urvina_logo.png" alt="Logo Urvina" srcset="" height="50" >
                </a>

            </div>
            <div class="navbar-collapse  w-100 dual-collapse2 order-2 order-md-2 flags enflag">
                <ul class="navbar-nav mr-auto text-center">
                    <li class="nav-item">
                        <a href="{{route(Route::currentRouteName(), 'en')}}">
                            <img src="/icons/en.svg" style="width:50px" alt="EN">
                          </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
