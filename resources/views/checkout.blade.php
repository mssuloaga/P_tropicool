@extends('welcome2')
@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-sm-12 bg-light">
           @if (count(Cart::getContent()))
            <table class="table table-striped" id="cotizacion">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>${{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-danger bi bi-x-lg"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                    <tbody>
                        <th>Iva</th>
                        <td></td>
                        <th>${{Cart::getTotal() * 0.19}}</th>
                        <td></td>
                        <td></td>
                    </tbody>
                    <tbody>
                        <th>Subtotal</th>
                        <td></td>
                        <th>${{ Cart::getTotal() - (Cart::getTotal() * 0.19) }}</th>
                        <td></td>
                        <td></td>
                    </tbody>
                    <thead>
                        <th>Total</th>
                        <th></th>
                        <th>${{Cart::getTotal()}}</th>
                        <th>{{Cart::getTotalQuantity()}}</th>
                        <th></th>
                    </thead>
                </tbody>
            </table>

            @else
                <p class="bi bi-cart-x"> Carrito vacio</p>
           @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ url()->previous() }}"><button type="submit" class="btn btn-success">Volver</button></a>
        </div>
        <div class="col" style="text-align: right;">
            <a href="#" id="cotizacion"><input type="submit" class="btn btn-danger" value="PDF"></a>
        </div>
    </div>
</div>
@endsection
