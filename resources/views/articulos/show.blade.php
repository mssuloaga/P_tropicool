@extends('welcome')
@section('content')
    <div class="container" style="margin-top: 8rem;">
        <div class="row" style="margin-top:1rem;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $articulos->nombre }}</h5>
                </div>
                <div class="card-body">
                    <div class="col">
                        <img src="{{ asset('uploads/productos/'.$articulos->imagen) }}">
                    </div>
                    <div class="col">
                        <div class="row">
                            <p class="card-text">${{ $articulos->precio }}</p>
                        </div>
                        <div class="row">
                            <p class="class-text">{{ $articulos->descripcion }}</p>
                        </div>
                        <div class="row">
                            <a href="#" class="btn btn-primary">Añadir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
