@extends('layouts.app')


@section('content')
    <div class="container">
        <div>

            <form  action="{{route("producto.import")}}" id="form-import" class="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Importar productos:</label>
                    <input id="input-import" type="file" class="form-control" name="file" value=""
                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                </div>
            
            </form>

        </div>

        <div>
            <button class="btn btn-success mr-3"
                onclick="window.location='{{ asset('img/plantilla/Plantilla_importar_Productos.xlsx') }}'">Descargar Plantilla</button>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('#input-import').change(function() {
            $('#form-import').submit();
        });
    </script>
@endsection

