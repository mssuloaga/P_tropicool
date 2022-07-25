@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Productos'])


@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Productos</h4>
              <p class="card-category">Importar productos</p>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">


    
                        <div>

                            <form  action="{{route("producto.import")}}" id="form-import" class="" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="mb-3">
                                    
                                    <input id="input-import" type="file" class="form-control" name="file" value=""
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                                </div>
                            
                            </form>

                        </div>

                        <div>
                            <button class="btn btn-success mr-3 "
                                onclick="window.location='{{ asset('img/plantilla/Plantilla_importar_Productos.xlsx') }}'">Descargar Plantilla</button>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script>
                        $('#input-import').change(function() {
                            $('#form-import').submit();
                        });
                    </script>

       
 
         </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

