@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Productos'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Productos</h4>
                      <p class="card-category">Ingresar datos</p>
                  </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.store') }}" class="formulario-agregar" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto.form')

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
                                                'El producto se ingreso con éxito.',
                                                'success'
                                            )
                                        </script>
                                    @endif
                                <script>                                
                                    $('.formulario-agregar').submit(function(e){
                                        e.preventDefault();
                                        Swal.fire({
                                        title: '¿Estás seguro?',
                                        text: "Este producto se ingresara definitivamente",
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