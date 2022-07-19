@extends('layouts.main', ['activePage' => 'stocks', 'titlePage' => 'Detalles del stock'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Stock</div>
                            <p class="card-category">Vista detallada del stock {{ $stock->nombre }}</p>
                    </div>

                    <div class="col-lg-6 col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Cantida</th>
                                            <td>{{ $stock->cantidad }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nombre</th>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                    
                            <div class="card-footer ">
                                <div class="button-container">
                                    <a href="{{ route('stocks.index') }}" class="btn btn-sm btn-warning mr-3"> Volver </a>                
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
