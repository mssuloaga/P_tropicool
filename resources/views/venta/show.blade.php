@extends('layouts.app')

@section('template_title')
    {{ $venta->name ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha Venta:</strong>
                            {{ $venta->fecha_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $venta->total }}
                        </div>
                        <div class="form-group">
                            <strong>N Comprobante:</strong>
                            {{ $venta->n_comprobante }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $venta->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $venta->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $venta->id_usuario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
