@extends('layouts.main', ['activePage' => 'perfil', 'titlePage' => 'Perfil'])

@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ Auth::user()->name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" placeholder="first name" value="{{ Auth::user()->name }}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Nombre de usuario</label><input type="text" class="form-control" placeholder="username" value="{{ Auth::user()->username }}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Correo</label><input type="text" class="form-control" placeholder="enter email id" value="{{ Auth::user()->email }}"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Guardar Perfil</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
