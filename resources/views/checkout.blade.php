@extends('welcome2')
@php
    $subtotal = 0;
@endphp
@section('content')
<div class="container">
    <div class="row">
       <div class="col-sm-12 bg-light">
           @if (count(Cart::getContent()))
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
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
                                    <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $subtotal = $subtotal + ($item->price * $item->quantity);
                        @endphp
                    @endforeach
                    <thead>
                        <th>Subtotal</th>
                        <th></th>
                        <th>${{ $subtotal }}</th>
                        <th></th>
                        <th></th>
                    </thead>

                </tbody>
            </table>

            @else
                <p>Carrito vacio</p>
           @endif

       </div>

    </div>
</div>
@endsection
