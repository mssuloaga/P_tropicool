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
        <link href="https://fonts.googleapis.com/css?family=Lato:400px,400,700,400pxitalic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=" {{ asset('css/styles_homepage.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <link href="https://fonts.googleapis.com/css?family=Poppins:400px,400,500,600,700,800,900" rel="stylesheet">
		
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
                    <li class="nav-item"><a class="nav-link" href="/">Contacto</a></li>
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
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('home') }}">
                                                    <div class="icon d-flex align-items-center justify-content-center mr-3">
                                                        <span class="ion-ios-cloud-download"></span>
                                                    </div>
                                                    Dashboard
                                                </a>
                                                <a class="dropdown-item d-flex align-items-center" id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
                            
                            <form id="logout-form"  onclick="borrarRegistro()" id="logout" name="logout-form" action="{{ route('logout') }}" type="submit" method="POST" class="d-none formulario-eliminar">
                                @csrf
                            </form>
                            @endcan
                        @else
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons text-light">perm_identity</i>
                            </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
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

    <section>
        @yield('content')
    </section>

    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5 text-white shadow rounded-pill">{{ $articulos->nombre }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="container">
        <div class="col bg-light pt-4" style="text-align: right;">
            @if (count(Cart::getContent()))
                <a href="{{route('cart.checkout')}}" class="bi bi-cart-check"> VER CARRITO <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
            @endif
        </div>
    </section>
    <section class="content container-fluid">
        <div class="row pt-4">
            <div class="col-lg-3 col-md-3 col-sm-12 p-2"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center shadow-lg rounded ">
                        <img class="pt-4" width="450px" height="450px" src="{{ asset('uploads/productos/'.$articulos->imagen) }}" alt="">

                        <div class="card-body">
                            <h5 class="card-title">{{ $articulos->nombre }}</h5>
                            <p class="card-text">{{ $articulos->descripcion }}</p>
                        <div class="row">
                            <div class="col-12">
                                <p class="bi bi-currency-dollar">{{  $articulos->precio }}</p>
                            </div>
                            <div class="col-12">
                                <form action="{{route('cart.add')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$articulos->id}}">
                                    <input type="submit" name="btn"  class="btn btn-success bi bi-bag-plus" value="+ Agregar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-2"></div>
        </div>
    </section>

    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="nosotros">Sobre Tropicool</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Términos y condiciones</a></li>
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

             <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>                                
                                <script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
<script> $(document).on("click", "#logout", function(e) { e.preventDefault(); var link = $(this).attr("href"); $.confirm({ title: 'Confirm!', content: 'Simple confirm!', buttons: { confirm: function () { $.alert('Confirmed!'); }, cancel: function () { $.alert('Canceled!'); }, somethingElse: { text: 'Something else', btnClass: 'btn-blue', keys: ['enter', 'shift'], action: function(){ $.alert('Something else?'); } } } }); }); </script>


 </script>
</body>
</html>



