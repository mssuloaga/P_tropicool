@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Nuevo permiso'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('permissions.store') }}" method="post" class="form-horizontal formulario-agregar">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Permiso</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del permiso</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" autofocus>
                    @if ($errors->has('name'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                  @endif
                  </div>
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
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
                        @if(session('agregar') == 'ok')
                                        <script>
                                            Swal.fire(
                                                'Ingresado!',
                                                'El permiso se ingreso con éxito.',
                                                'success'
                                            )
                                        </script>
                                    @endif
                                <script>                                
                                    $('.formulario-agregar').submit(function(e){
                                        e.preventDefault();
                                        Swal.fire({
                                        title: '¿Estás seguro?',
                                        text: "Este permiso se ingresara definitivamente",
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