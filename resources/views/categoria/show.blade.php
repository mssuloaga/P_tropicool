@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Detalles de la categoría'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Categoría</div>
                            <p class="card-category">Vista detallada de la categoría {{ $categoria->nombre }}</p>
                    </div>

                    <div class="col-lg-6 col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $categoria->nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Empresa</th>
                                            <td>{{ $categoria->empresa->nombre }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                    
                            <div class="card-footer ">
                                <div class="button-container">
                                    <a href="{{ route('categorias.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>                
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
