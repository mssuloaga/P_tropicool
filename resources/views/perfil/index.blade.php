@extends('layouts.main', ['activePage' => 'perfil', 'titlePage' => 'Perfil'])

@section('content')

        <div class="container rounded bg-white mt-5 mb-5">
            <form action="{{route('changePassword')}}" method="POST" class="needs-validation" novalidate>
            @csrf  

                
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ Auth::user()->name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span></div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Actualizar perfil</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label for="name" class="labels">Nombre</label><input name="name" type="text" class="form-control" placeholder="Nombre" value="{{ Auth::user()->name }}"></div>   
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="username" class="labels">Nombre de usuario</label><input name="username" type="text" class="form-control" placeholder="Nombre de usuario" value="{{ Auth::user()->username }}" readonly></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="email" class="labels">Correo</label><input name="email" type="text" class="form-control" placeholder="Correo" value="{{ Auth::user()->email }}" readonly></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="password_actual" class="labels">Contraseña actual</label><input type="password" name="password_actual" class="form-control" placeholder="" value=""></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="new_password" class="labels">Contraseña nueva</label><input type="password" name="password" class="form-control" placeholder="" value=""> </div> 
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="password" class="labels">Confirmar contraseña nueva</label><input type="password" name="confirm_password" class="form-control" placeholder="" value=""></div>
                            </div>
                            @if (\Session::has('name'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('name') !!}</li>
                                    </ul>
                                </div>
                            @endif
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
                            @if (\Session::has('NoCoinciden'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('NoCoinciden') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button" type="button">Guardar Perfil</button></div>
                            <div class="mt-2 text-center"><a href="{{ route('home') }}" class="btn btn-success">Volver</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
