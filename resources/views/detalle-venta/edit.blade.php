@extends('layouts.app')

@section('template_title')
    Update Detalle Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Detalle Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detalle-ventas.update', $detalleVenta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('detalle-venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
