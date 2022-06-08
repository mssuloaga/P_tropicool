@extends('layouts.app')

@section('template_title')
    {{ $trabajadore->name ?? 'Show Trabajadore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Trabajadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('trabajadores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $trabajadore->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Rut Usuario:</strong>
                            {{ $trabajadore->rut_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $trabajadore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $trabajadore->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $trabajadore->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $trabajadore->email }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Ingreso:</strong>
                            {{ $trabajadore->fecha_ingreso }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Salida:</strong>
                            {{ $trabajadore->fecha_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Sueldo:</strong>
                            {{ $trabajadore->sueldo }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $trabajadore->cargo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
