@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <form action="{{ route('users.store') }}" method="post" class="form-horizontal formulario-agregar" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Usuario</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="image" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="image" value="{{ old('image') }}" autofocus>
                  @if ($errors->has('image'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('image') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" autofocus>
                  @if ($errors->has('name'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="username" class="col-sm-2 col-form-label">Nombre de usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}">
                  @if ($errors->has('username'))
                    <span class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" name="password" placeholder="Contraseña">
                  @if ($errors->has('password'))
                    <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <table class="table">
                                    <tbody>
                                        @foreach ($roles as $id => $role)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="roles[]"
                                                            value="{{ $id }}"
                                                        >
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $role }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!--Footer-->
            <div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('users.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
    </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection



@section('js')
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        @if(session('agregar') == 'ok')
                                        <script>
                                            Swal.fire(
                                                'Ingresado!',
                                                'El usuario se ingreso con éxito.',
                                                'success'
                                            )
                                        </script>
                                    @endif
                                <script>                                
                                    $('.formulario-agregar').submit(function(e){
                                        e.preventDefault();
                                        Swal.fire({
                                        title: '¿Estás seguro?',
                                        text: "Este usuario se ingresara definitivamente",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: '¡Si, ingresar!',
                                        cancelButtonText: 'Cancelar'

                                        }).then((result) => {
                                            if (result.isConfirmed) {                                               
                                                this.submit();                                           
                                            }
                                        })
                                    });                        

                                </script>
                    @endsection