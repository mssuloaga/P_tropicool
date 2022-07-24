@extends('layouts.main', ['activePage' => 'perfil', 'titlePage' => 'Perfil'])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <form action="{{route('changePassword')}}" method="POST" class="needs-validation" novalidate>
            @csrf    
              
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" height="150px" src="{{ asset('uploads/usuarios/'.Auth::user()->image) }}"><span class="font-weight-bold">{{ Auth::user()->name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span></div>
                    </div>
                    <div class="col-md-5 border-right overflow-hidden">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Actualizar perfil</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label for="name" class="labels">Nombre</label><input name="name" type="text" class="form-control" placeholder="Nombre" value="{{ Auth::user()->name }}"></div>   
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="username" class="labels">Nombre de usuario</label><input name="username" type="text" class="form-control" placeholder="Nombre de usuario" value="{{ Auth::user()->username }}" ></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="email" class="labels">Correo</label><input name="email" type="text" class="form-control" placeholder="Correo" value="{{ Auth::user()->email }}" ></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="password_actual" class="labels">Contraseña actual</label><input type="password" name="password_actual" class="form-control" placeholder="Solo ingresar estos campos en caso de cambiar la contraseña" value=""></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="new_password" class="labels">Contraseña nueva</label><input type="password" name="password" class="form-control" placeholder="Solo ingresar estos campos en caso de cambiar la contraseña" value=""> </div> 
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="password" class="labels">Confirmar contraseña nueva</label><input type="password" name="confirm_password" class="form-control" placeholder="Solo ingresar estos campos en caso de cambiar la contraseña" value=""></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="image" class="labels">Foto de perfil</label><input type="file" class="form-control" name="image" value="" autofocus></div>
                            </div>
                            @if (\Session::has('updateDatos'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('updateDatos') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if (\Session::has('clavemenor'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('clavemenor') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if (\Session::has('claveIncorrecta'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('claveIncorrecta') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <div>
                                 <div class="text-center p-4">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a href="{{ route('home') }}" class="btn btn-warning ms-3"> Volver </a>                    
                                </div>                   
                        </div>                        
                    </div>
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
