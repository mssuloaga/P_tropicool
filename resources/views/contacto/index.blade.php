<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tropicool</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=" {{ asset('css/styles_homepage.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="css/style.css">
    </head>
    <body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/" ><img class="logo d-inline-block align-top" src="\logo\IMG_7359_sin_fondo.ico"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="/articulos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/nosotros">¿Quiénes somos?</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contacto">Contacto</a></li>
                    @if (Route::has('login'))
                        @auth
                            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">¡Hola, {{ Auth::user()->name }}!</a></li> -->
                            @can('post_index')
                            <li class="nav-item dropdown text-center">
                            <!-- <img class="rounded-circle" src="{{ asset('uploads/usuarios/'.Auth::user()->image) }}" width="50px" height="50px" alt="Imagen"> -->
                                <!-- <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ¡Hola, {{ Auth::user()->name }}!
                                </a> -->
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="/perfil">{{ __('Perfil') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Ajustes') }}</a>
                                <a class="dropdown-item" href="{{ route('home') }}">{{ __('dashboard') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
                                </div>
                            </li>

                            <!-- <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 d-flex justify-content-center"> -->
                                        <div class="btn-group">
                                            <a href="#" class="btn-img img dropdown-toggle rounded-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-image: url(images/person_1.jpg);">
                                                <img class="rounded-circle" src="{{ asset('uploads/usuarios/'.Auth::user()->image) }}" width="40px" height="40px" alt="Imagen">
                                            </a>
                                            <div style="top: -150%;" class="dropdown-menu">
                        
                                                <a class="dropdown-item d-flex align-items-center" href="/perfil">
                                                    <div class="icon d-flex align-items-center justify-content-center mr-3">
                                                        <span class="ion-ios-person-add"></span>
                                                    </div>
                                                    Perfil
                                                </a>
                                                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <div class="icon d-flex align-items-center justify-content-center mr-3">
                                                        <span class="ion-ios-settings"></span>
                                                    </div>
                                                    Ajustes
                                                </a> -->
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('home') }}">
                                                    <div class="icon d-flex align-items-center justify-content-center mr-3">
                                                        <span class="ion-ios-cloud-download"></span>
                                                    </div>
                                                    Dashboard
                                                </a>
                                                <a class="dropdown-item d-flex align-items-center"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <div class="icon d-flex align-items-center justify-content-center mr-3">
                                                        <span class="ion-ios-power"></span>
                                                    </div>
                                                    Salir
                                                </a>
                                            </div>
                                        </div>
                                    <!-- </div>
                                </div>
                            </div> -->
                            
                            <form id="logout-form" name="logout-form" action="{{ route('logout') }}" type="submit" method="POST" class="d-none formularioSalir">
                                @csrf
                               
                            </form>
                            @endcan
                        @else
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <li>
                                    <a style="color: black; position:relative; bottom: 5px; right: 14px; font-weight: 600; letter-spacing: 0.0625em; font-size: 0.95rem; font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";" class="nav-item">
                                        INICIAR SESIÓN 
                                        <i style="position:relative; top:5px;" class="material-icons text-light">perm_identity</i>
                                    </a>
                                </li>
                            </button>

                        <div style="top: 35px" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li class="nav-item"><a class="dropdown-item" href="{{ route('login') }}">Acceder</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="dropdown-item" href="{{ route('register') }}">Registrarse</a></li>
                            @endif
                        @endauth
                    @endif
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">@foreach ($contacto as $contact)</h1>
                        <div class="container" style="margin: 30px 0px 0px 0px">
                    <div class="row">
                        <div class="col">
                            <h1 style="text-align: center;">{{ $contact->nombre }}</h1>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin: 50px 0px 0px 0px">
                    <div class="row">
                        <div class="col">
                            <h2 style="text-align: center;">Dirección</h2>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col">
                            <label>{{ $contact->direccion}}</label>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin: 50px 0px 0px 0px">
                    <div class="row">
                        <div class="col">
                            <h2 style="text-align: center;">Instagram</h2>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col">
                            <a href="https://www.instagram.com/__tropicool_/">
                            <label>{{ $contact->instagram }}</label>
                            </a>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col p pt-4">
                            <h2 class="pt-2">Código QR:</h2>
                            <div>
                                {!!QrCode::size(200)->generate('http://143.110.229.105/');!!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        @yield('content')
    </section>

    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="contacto">Sobre Tropicool</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Térmicontact y condiciones</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Política de privacidad</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy;2022 TROPICOOL Todos los derechos reservados</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/__tropicool_/"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

       <!-- Bootstrap core JS-->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts_homepage.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        
            @yield('js')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
             <script src="{{ asset('js/sweetAlert.js') }}" defer></script>

    </body>
</html>

@section('js')
<script> 
 
 Swal.fire('Any fool can use a computer')
 </script>

@endsection

