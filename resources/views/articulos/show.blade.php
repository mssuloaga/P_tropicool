@extends('welcome')
@section('content')
    <div class="container" style="text-align: center;">
        <h1>{{ $articulos->nombre }}</h1>
        <div class="row">
            <div class="col">
                <img src="{{ asset('uploads/productos/'.$articulos->imagen) }}">
            </div>
            <div class="col">
                <div class="row">
                    <h2>${{ $articulos->precio }}</h2>
                </div>
                <div class="row">
                    <label>{{ $articulos->descripcion }}</label>
                </div>
                <div class="row">
                    <a href="" class="btn btn-primary">Añadir</a>
                </div>
            </div>
        </div>
    </div>
@endsection
