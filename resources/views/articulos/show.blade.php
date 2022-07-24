@extends('welcome2')
@section('content')
    <section class="container">
        <div class="col bg-light" style="text-align: right;">
            @if (count(Cart::getContent()))
                <a href="{{route('cart.checkout')}}"> VER CARRITO <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
            @endif
        </div>
    </section>
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
                                <form action="{{route('cart.add')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$articulos->id}}">
                                    <input type="submit" name="btn"  class="btn btn-success bi bi-bag-plus" value="+ Agregar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
@endsection
