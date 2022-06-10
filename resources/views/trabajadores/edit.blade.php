@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => 'Editar trabajador '])
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
                        <form action="{{ url('/trabajadores/'.$trabajadore->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            @include('trabajadores.form',['modo'=>'']);
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
