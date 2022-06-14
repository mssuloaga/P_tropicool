@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => 'Editar trabajador'])
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Trabajador</h4>
                        <p class="card-category">Editar datos</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('trabajadores.update', $trabajadore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('trabajadore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
