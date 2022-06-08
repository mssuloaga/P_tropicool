@extends('layouts.app')

@section('template_title')
    {{ $evento->name ?? 'Show Evento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Evento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $evento->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $evento->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $evento->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Termino:</strong>
                            {{ $evento->fecha_termino }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $evento->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
