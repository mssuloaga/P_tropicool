@extends('layouts.app')

@section('template_title')
    {{ $detalleVenta->name ?? 'Show Detalle Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalle Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Venta:</strong>
                            {{ $detalleVenta->id_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $detalleVenta->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleVenta->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $detalleVenta->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
