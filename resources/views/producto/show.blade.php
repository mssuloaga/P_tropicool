@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Detalles del producto'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Producto</div>
                            <p class="card-category">Vista detallada del producto {{ $producto->nombre }}</p>
                    </div>

                    <div class="col-lg-6 col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $producto->nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Descripción</th>
                                            <td>{{ $producto->descripcion}}</td>
                                        </tr>
                                        <tr>
                                            <th>Precio</th>
                                            <td>{{ $producto->precio}}</td>
                                        </tr>
                                        <tr>
                                            <th>Cantidad</th>
                                            <td>{{ $producto->cantidad}}</td>
                                        </tr>
                                        <tr>
                                            <th>Categoría</th>
                                            <td>{{ $producto->categoria->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <th>Imagen</th>
                                            <td><img src="{{ asset('uploads/productos/'.$producto->imagen) }}" width="80px" height="80px" alt="Image"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    
                            <div class="card-footer ">
                                <div class="button-container">
                                    <a href="{{ route('productos.index') }}" class="btn btn-sm btn-warning mr-3"> Volver </a>                
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
