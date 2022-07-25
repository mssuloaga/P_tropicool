@extends('layouts.main', ['activePage' => 'empresas', 'titlePage' => 'Empresas'])

@section('template_title')
    Create Empresa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Empresa</h4>
                      <p class="card-category">Ingresar datos</p>
                  </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empresas.store') }}"  class="formulario-agregar" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('empresa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        @if(session('agregar') == 'ok')
                                        <script>
                                            Swal.fire(
                                                'Ingresado!',
                                                'La Empresa se ingreso con éxito.',
                                                'success'
                                            )
                                        </script>
                                    @endif
                                <script>                                
                                    $('.formulario-agregar').submit(function(e){
                                        e.preventDefault();
                                        Swal.fire({
                                        title: '¿Estás seguro?',
                                        text: "Esta Empresa se ingresara definitivamente",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: '¡Si, ingresar!',
                                        cancelButtonText: 'Cancelar'

                                        }).then((result) => {
                                            if (result.isConfirmed) {                                               
                                                this.submit();                                           
                                            }
                                        })
                                    });                        

                                </script>
                    @endsection
