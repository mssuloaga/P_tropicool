@extends('layouts.main', ['activePage' => 'empresas', 'titlePage' => 'Editar empresa'])
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Empresa</h4>
                        <p class="card-category">Editar datos</p>
                    </div>
                     <div class="card-body">
                        <form method="POST" action="{{ route('empresas.update', $empresa->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('empresa.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
