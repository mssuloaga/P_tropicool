@extends('welcome')
@section('content')
    <section class="content container-fluid">
        <div class="container align-center" style="text-align: center;">
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('uploads/productos/'.$articulos->imagen) }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $articulos->nombre }}</h5>
                    <p class="card-text">{{ $articulos->descripcion }}</p>
                    <div class="row">
                        <div class="col">
                            <p class="bi bi-currency-dollar">{{  $articulos->precio }}</p>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-success bi bi-bag-plus"> Añadir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
