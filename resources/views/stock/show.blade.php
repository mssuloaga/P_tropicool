@extends('layouts.app')

@section('template_title')
    {{ $stock->name ?? 'Show Stock' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Stock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('stocks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $stock->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Id Productos:</strong>
                            {{ $stock->id_productos }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
