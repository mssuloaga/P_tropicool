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
      <li class="nav-item{{ $activePage == 'calendario' ? ' active' : '' }}">
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
      @endcan
      @can('user_index')
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">content_paste</i>
            <p>Usuarios</p>
        </a>
      </li>
      @endcan
      @can('permission_index')
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
      @endcan
      @can('role_index')
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
      @endcan
      @can('role_index')
      <li class="nav-item{{ $activePage == 'trabajadores' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('trabajadores.index') }}">
          <i class="material-icons">assignment_ind</i>
            <p>{{ __('Trabajadores') }}</p>
        </a>
      </li>
      @endcan
      @can('role_index')
      <li class="nav-item{{ $activePage == 'empresas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('empresas.index') }}">
          <i class="material-icons">home_filled</i>
            <p>{{ __('Empresa') }}</p>
        </a>
      </li>
      @endcan
    </ul>
  </div>
</div>
