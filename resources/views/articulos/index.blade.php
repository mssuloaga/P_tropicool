@extends('welcome')
@section('content')
    <div class="container" style="margin-top: 8rem;">
        <div class="row" style="margin-top:1rem;">
            @foreach($articulos as $a)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem; margin-top: 2rem;">
                        <div class="card-body">
                            <img src="{{ asset('uploads/productos/'.$a->imagen) }}" class="card-img-top" title="{{ $a->descripcion }}" alt="{{ $a->descripcion }}">
                            <h5 class="card-title">{{ $a->nombre }}</h5>
                            <div class="row">
                                <div class="col">
                                    <p class="card-text">${{ $a->precio }}</p>
                                </div>
                                <div class="col">
                                    <a href="{{ route('articulos.show',$a->id) }}" class="btn btn-primary">Añadir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
