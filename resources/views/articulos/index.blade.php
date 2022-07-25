@extends('welcome2', ['activePage' => 'articulos', 'titlePage' => 'Productos'])
@section('content')
    <section class="container">
        <div class="col bg-light" style="text-align: right;">
            @if (count(Cart::getContent()))
                <a href="{{route('cart.checkout')}}" class="bi bi-cart-check"> VER CARRITO <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
            @endif
        </div>
    </section>
    <section class="container container-fluid">
        <form class="form-inline" action="{{ route('articulos.busqueda') }}">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 bi bi-search" type="submit"> Buscar</button>
        </form>
    </section>
    <section class="container container-fluid">
        @foreach ($categorias as $categoria)
            <div class="row mt-5">
                <h1>{{ $aux = $categoria->nombre }}</h1>
                @foreach ( $articulos as $articulo )
                    @if ($aux == $articulo->categoria->nombre)
                        <div class="col">
                            <div class="col">
                                <div class="card p-5 mt-3 shadow">
                                    <div class="card-body" >
                                        <a href="{{ route('articulos.show', $articulo->id) }}"><img width="300px" height="300px" src="{{ asset('uploads/productos/'.$articulo->imagen) }}" class="card-img-top" title="{{ $articulo->descripcion }}" alt="{{ $articulo->descripcion }}"></a>
                                        <a href="{{ route('articulos.show', $articulo->id) }}"><h5 class="card-title">{{ $articulo->nombre }}</h5></a>
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-text bi bi-currency-dollar">{{ $articulo->precio .' CLP' }}</p>
                                            </div>
                                            <div class="col">
                                                <form action="{{route('cart.add')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$articulo->id}}">
                                                    <input type="submit" name="btn"  class="btn btn-success bi bi-bag-plus" value="+ Agregar">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </section>
</div>
@endsection
