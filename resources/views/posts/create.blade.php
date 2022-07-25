@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Nuevo Post'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('posts.store') }}" class="form-horizontal formulario">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Publicación</h4>
              <p class="card-category">Ingresar datos de la nueva publicación</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Nombre Publicación</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el nombre "
                    autocomplete="off" autofocus>
                </div>
              </div>
            </div>

            <!--End body-->

            <!--Footer-->
            <div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success formulario">Guardar</button>
            <a href="{{ route('posts.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
    </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        @if(session('agregar') == 'okk')
                                        <script>
                                            Swal.fire(
                                                'Ingresado!',
                                                'La publicacioón se ingreso con éxito.',
                                                'success'
                                            )
                                        </script>
                                    @endif
                                <script>                                
                                    $('.formulario').submit(function(e){
                                        e.preventDefault();
                                        Swal.fire({
                                        title: '¿Estás seguro?',
                                        text: "'El publicacioón se ingresara definitivamente",
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