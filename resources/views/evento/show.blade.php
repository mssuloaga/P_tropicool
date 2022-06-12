@extends('layouts.main', ['activePage' => 'eventos', 'titlePage' => 'Detalles del evento'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Evento</div>
                            <p class="card-category">Vista detallada del evento {{ $evento->nombre }}</p>
                    </div>

                    <div class="col-lg-6 col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $evento->nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Dirección</th>
                                            <td>{{ $evento->direccion}}</td>
                                        </tr>
                                        <tr>
                                            <th>Valor</th>
                                            <td>{{ $evento->precio}}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha Inicio</th>
                                            <td>{{ $evento->fecha_inicio}}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha Término</th>
                                            <td>{{ $evento->fecha_termino}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                    
                            <div class="card-footer ">
                                <div class="button-container">
                                    <a href="{{ route('eventos.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>                
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
