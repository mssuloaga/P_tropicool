@extends('layouts.main', ['activePage' => 'empresas', 'titlePage' => 'Detalles de la empresa'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Empresa</div>
                            <p class="card-category">Vista detallada de la empresa {{ $empresa->nombre }}</p>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $empresa->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td>{{ $empresa->logo }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $empresa->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td>{{ $empresa->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Misión</th>
                            <td>{{ $empresa->mision }}</td>
                        </tr>
                        <tr>
                            <th>Visión</th>
                            <td>{{ $empresa->vision }}</td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td>{{ $empresa->descripcion }}</td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td>{{ $empresa->instagram }}</td>
                        </tr>
                        <tr>
                            <th>Facebook</th>
                            <td>{{ $empresa->facebook }}</td>
                        </tr>
                        </table>
                    </div>
                    
                    <div class="card-footer ">
                        <div class="button-container">
                            <a href="{{ route('empresas.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>                
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
