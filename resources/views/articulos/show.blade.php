@extends('welcome2')
@section('content')
    <section class="content container-fluid">
        <div class="container align-center" style="text-align: center;">
            <center>
                <div class="card  p-3">
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
            </center>
        </div>
    </section>
@endsection
