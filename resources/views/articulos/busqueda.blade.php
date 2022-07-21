@extends('welcome2', ['activePage' => 'articulos', 'titlePage' => 'Productos'])
@section('content')
    <section class="container container-fluid">
        <form class="form-inline" action="{{ route('articulos.busqueda') }}">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 bi bi-search" type="submit"> Buscar</button>
        </form>
    </section>
    <section class="container container-fluid">
        <div class="row" style="margin-top:1rem;">
            @foreach ( $producto as $articulo )
                <div class="col">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; margin-top: 2rem;">
                            <div class="card-body">
                                <a href="{{ route('articulos.show', $articulo->id) }}"><img src="{{ asset('uploads/productos/'.$articulo->imagen) }}" class="card-img-top" title="{{ $articulo->descripcion }}" alt="{{ $articulo->descripcion }}"></a>
                                <a href="{{ route('articulos.show', $articulo->id) }}"><h5 class="card-title">{{ $articulo->nombre }}</h5></a>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text bi bi-currency-dollar">{{ $articulo->precio .' CLP'}}</p>
                                    </div>
                                    <div class="col">
                                        <a href="" class="btn btn-success bi bi-bag-plus"> Añadir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
