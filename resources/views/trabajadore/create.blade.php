@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => 'Trabajadores'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Trabajadores</h4>
                      <p class="card-category">Ingresar datos</p>
                  </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('trabajadores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('trabajadore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
