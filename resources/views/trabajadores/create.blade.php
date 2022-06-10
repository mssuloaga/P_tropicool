
@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => __('Trabajador')])
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Trabajador</h4>
                      <p class="card-category">Ingresar datos</p>
                  </div>
                    <div class="card-body">
                        <form action="{{ url('/trabajadores') }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            @include('trabajadores.form', ['modo'=>'Crear']));
        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection