@extends('layouts.app')

@section('template_title')
    {{ $empresa->name ?? 'Show Empresa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empresa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empresa->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $empresa->logo }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empresa->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $empresa->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Mision:</strong>
                            {{ $empresa->mision }}
                        </div>
                        <div class="form-group">
                            <strong>Vision:</strong>
                            {{ $empresa->vision }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $empresa->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Instagram:</strong>
                            {{ $empresa->instagram }}
                        </div>
                        <div class="form-group">
                            <strong>Facebook:</strong>
                            {{ $empresa->facebook }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
