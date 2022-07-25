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
                                <li style="position:relative; bottom: 12px; right: 14px; font-weight: 700; letter-spacing: 0.0625em; font-size: 0.95rem; font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";" class="nav-item">
                                    <a class="nav-link">INICIAR SESIÓN <i style="position:relative; top:5px;" class="material-icons text-light">perm_identity</i></a>
                                </li>
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

    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">¡Bienvenido!</h1>
                        <!-- Signup form-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
<!--                             <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
-->                                <!-- Email address input-->
                            <!-- <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                                </div>
                                <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                            </div> -->
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <!-- <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    <p>To activate this form, sign up at</p>
                                    <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div> -->
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <!-- <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        @yield('content')
    </section>
    
    
    
    <section class="ftco-section text-center">
        <h1 class="mb-5">Encuéntranos en:</h1>
        <div class="row">
            <div class="col-lg-1 col-md-1 p-4"></div>
            <div class="col-lg-4 col-xs-12 col-sm-12">
                <iframe class="shadow-lg" width="450px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14719.269689674013!2d-72.40755232304765!3d-37.03325147783006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96696b9f5c409261%3A0xe109573d1fe50655!2zQ2FicmVybywgQsOtbyBCw61v!5e0!3m2!1ses-419!2scl!4v1658347780698!5m2!1ses-419!2scl" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-2 col-md-1 p-2"></div>
            <div class="col-lg-4 col-xs-12 col-sm-12">
                <iframe class="shadow-lg" width="450px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14764.635575155658!2d-73.05433459479566!3d-36.79855219785074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669b5d061cae83d%3A0x8f2da2e9988cc125!2sUniversidad%20Cat%C3%B3lica%20de%20la%20Sant%C3%ADsima%20Concepci%C3%B3n!5e0!3m2!1ses-419!2scl!4v1658348010524!5m2!1ses-419!2scl" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
                <!-- {!!QrCode::size(250)->generate('http://143.110.229.105');!!} -->
        </div>
    </section>

    <section class="ftco-section text-center">
        <h1 class="mb-5">Código QR:</h1>
        <div>
            {!!QrCode::size(200)->generate('http://143.110.229.105/');!!}
        </div>
    </section>

        <!-- <div class="col-md-3 mt-2 mb-2">
        <label for="nombre" id="nombre">asd </label>
            {{$miQr = QrCode::
                    size(200)
                    ->generate('http://143.110.229.105/')}}
        </div> -->
        
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

    </body>
</html>

@section('js')


<script> 
 
 Swal.fire('Any fool can use a computer')
 </script>

@endsection