<link href="css/sb-admin.css" rel="stylesheet">
<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/" class="simple-text logo-normal">
      <img src="\logo\IMG_7359_sin_fondo.ico" width="30px" height="30px"> Tropicool
    </a>
  </div>

  <div class="sidebar-wrapper">
    <ul class="nav">
    @can('post_index')
      <li class="nav-item dropdown text-center">
      <img class="rounded-circle" src="{{ asset('uploads/usuarios/'.Auth::user()->image) }}" width="100px" height="100px" alt="Imagen">
        <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
          <a class="dropdown-item" href="/perfil">{{ __('Perfil') }}</a>
          <!-- <a class="dropdown-item" href="#">{{ __('Ajustes') }}</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
        </div>
      </li>
    @endcan
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Panel de Control') }}</p>
        </a>
      </li>

      @can('post_index')
      <li class="nav-item{{ $activePage == 'posts' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('posts.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Publicaciones') }}</p>
        </a>
      </li>
      @endcan
      
      <!-- Divider -->
      <hr class="mt-3 sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Gestión de productos
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      @can('role_index')
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i style="position: relative; bottom: 5px;" class="material-icons">shopping_bag</i>
          <span style="font-size: 14px; font-weight: 400;">Categoría de productos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">
            <h6 class="collapse-header">Personalizar:</h6>
            <a class="nav-link" href="{{ route('productos.index') }}">
              <i class="material-icons">sell</i>
                <p>{{ __('Productos') }}</p>
            </a>
            <a class="nav-link" href="{{ route('categorias.index') }}">
              <i class="material-icons">dns</i>
                <p>{{ __('Categorías') }}</p>
            </a>
            <a class="nav-link" href="{{ route('stocks.index') }}">
              <i class="material-icons">inventory</i>
                <p>{{ __('Stock') }}</p>
            </a>
          </div>
        </div>
      </li>
      @endcan
      <!-- Divider -->
      <hr class="mt-3 sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Gestión de personal y usuarios
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      @can('role_index')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i style="position: relative; top: 5px;" class="material-icons">account_box</i>
          <span style="font-size: 14px; font-weight: 400;">Categoría de personal y usuarios</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">
            <h6 class="collapse-header">Personalizar:</h6>
            <a class="nav-link" href="{{ route('users.index') }}">
              <i class="material-icons">content_paste</i>
                <p>Usuarios</p>
            </a>
            <a class="nav-link" href="{{ route('trabajadores.index') }}">
              <i class="material-icons">assignment_ind</i>
                <p>{{ __('Trabajadores') }}</p>
            </a>
          </div>
        </div>
      </li>
      @endcan

      <!-- Divider -->
      <hr class="mt-3 sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Gestión de permisos
      </div>

      @can('role_index')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="true" aria-controls="collapseFour">
            <i style="position: relative; bottom: 5px;" class="material-icons">credit_card</i>
          <span style="font-size: 14px; font-weight: 400;">Categoría de permisos</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">
            <h6 class="collapse-header">Personalizar:</h6>
            <a class="nav-link" href="{{ route('permissions.index') }}">
              <i class="material-icons">bubble_chart</i>
              <p>{{ __('Permisos') }}</p>
            </a>
            <a class="nav-link" href="{{ route('roles.index') }}">
              <i class="material-icons">location_ons</i>
                <p>{{ __('Roles') }}</p>
            </a>
          </div>
        </div>
      </li>
      @endcan

      <!-- Divider -->
      <hr class="mt-3 sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Gestión de empresa y eventos
      </div>

      @can('role_index')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
            aria-expanded="true" aria-controls="collapseFive">
            <i style="position: relative; bottom: 5px;" class="material-icons">analytics</i>
          <span style="font-size: 14px; font-weight: 400;">Categoría de empresa y eventos</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
          <div class="bg-black py-2 collapse-inner rounded">
            <h6 class="collapse-header">Personalizar:</h6>
            <a class="nav-link" href="{{ route('empresas.index') }}">
              <i class="material-icons">home_filled</i>
                <p>{{ __('Empresa') }}</p>
            </a>
            <a class="nav-link" href="{{ url('calendario.full-calendar') }}">
              <i class="material-icons">event</i>
                <p>{{ __('Calendario') }}</p>
            </a>
          </div>
        </div>
      </li>
      @endcan

      <!-- <li class="nav-item{{ $activePage == 'calendario' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('calendario.full-calendar') }}">
          <i class="material-icons">event</i>
            <p>{{ __('Calendario') }}</p>
        </a>
      </li>
      @can('post_index')
      <li class="nav-item{{ $activePage == 'posts' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('posts.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Publicaciones') }}</p>
        </a>
      </li>
      @endcan -->
      <!-- @can('user_index')
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">content_paste</i>
            <p>Usuarios</p>
        </a>
      </li>
      @endcan -->
      <!-- @can('permission_index')
      <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('permissions.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Permisos') }}</p>
        </a>
      </li>
      @endcan
      @can('role_index')
      <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Roles') }}</p>
        </a>
      </li>
      @endcan -->
      <!-- @can('role_index')
      <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('productos.index') }}">
          <i class="material-icons">sell</i>
            <p>{{ __('Productos') }}</p>
        </a>
      </li>
      @endcan
      @can('role_index')
      <li class="nav-item{{ $activePage == 'categorias' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('categorias.index') }}">
          <i class="material-icons">dns</i>
            <p>{{ __('Categorías') }}</p>
        </a>
      </li>
      @endcan
      @can('role_index')
      <li class="nav-item{{ $activePage == 'stocks' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('stocks.index') }}">
          <i class="material-icons">inventory</i>
            <p>{{ __('Stock') }}</p>
        </a>
      </li>
      @endcan -->
      <!-- @can('role_index')
      <li class="nav-item{{ $activePage == 'trabajadores' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('trabajadores.index') }}">
          <i class="material-icons">assignment_ind</i>
            <p>{{ __('Trabajadores') }}</p>
        </a>
      </li>
      @endcan -->
      <!-- @can('role_index')
      <li class="nav-item{{ $activePage == 'empresas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('empresas.index') }}">
          <i class="material-icons">home_filled</i>
            <p>{{ __('Empresa') }}</p>
        </a>
      </li>
      @endcan -->
    </ul>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/sweetAlert.js') }}" defer></script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>