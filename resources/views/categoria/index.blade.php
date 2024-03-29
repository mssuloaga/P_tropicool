@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Categoría'])

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Categoría</h4>
            <p class="card-category">Lista de categorías registradas</p>
          </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="col-12 text-right">
                            <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-facebook">Añadir categoría</a>
                        </div>
                        
                    </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped shadow-lg mt-4" style="width:100%" id="categorias">
                                <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
										<th>Nombre</th>
										<th>Empresa</th>
										
                                        <th class="text-right no-exportar"> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoria->nombre }}</td>
											<td>{{ $categoria->empresa->nombre }}</td>

                                            <td class="td-actions text-right">
                                                
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categorias.show',$categoria->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categorias.edit',$categoria->id) }}" class="btn btn-info"><i class="material-icons">edit</i></a>
                                                    <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST" class="formulario-eliminar" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                                    <i class="material-icons">delete</i>
                                                    </button>
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @section('js')
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                @if(session('eliminar') == 'ok')
                                    <script>
                                        Swal.fire(
                                            '¡Eliminado!',
                                            'La categoria se elimino con éxito.',
                                            'success'
                                        )
                                    </script>
                                @endif
                                <script>
                                    $('.formulario-eliminar').submit(function(e){
                                        e.preventDefault();
                                        Swal.fire({
                                        title: '¿Estás seguro?',
                                        text: "Esta categoria se eliminara definitivamente",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: '¡Si, eliminar!',
                                        cancelButtonText: 'Cancelar'

                                        }).then((result) => {
                                            if (result.isConfirmed) {                                               
                                                this.submit();                                           
                                            }
                                        })
                                    });
                                   

                                </script>
                                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
                                <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
                                <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
                                <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
                                <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
                                <script>
                                $(document).ready(function () {
                                $('#categorias').DataTable(
                                {
                                    responsive:"true",
                                    dom: 'Bftirpl',
                                    buttons: 
                                    [
                                        {
                                            extend: 'excelHtml5',
                                            text: '<a href=""><img class="logo d-inline-block align-top" width="40px" src="img/excel.png"/></a>',
                                            titleAttr:'Exportar Excel',
                                            className: 'btn-success',
                                            title: "Categorias",
                                            exportOptions: 
                                                {
                                                columns: ":not(.no-exportar)"
                                                }
                                        },
                                        {
                                            extend: 'pdfHtml5',
                                            text: '<a href=""><img class="logo d-inline-block align-top" width="40px" src="img/pdf.png"/></a>',
                                            titleAttr:'Exportar Excel',
                                            className: 'btn-xs btn-danger',
                                            title: "Categorias",
                                            exportOptions: 
                                                {
                                                columns: ":not(.no-exportar)"
                                                }
                                        },
                                        {
                                            extend: 'print',
                                            text: '<a href=""><img class="logo d-inline-block align-top" width="40px" src="img/print.png"/></a>',
                                            titleAttr:'Imprimir',
                                            className: 'btn-primary',
                                            title: "<center>Categorias</center>",
                                            exportOptions: 
                                                {
                                                columns: ":not(.no-exportar)"
                                                }
                                        }
                                    
                                    ],    
                                    
                                    "language": 
                                    {
                                        "lengthMenu": "Mostrar _MENU_ registros por página",
                                        "zeroRecords": "No hay coincidencias - Verifique",
                                        "info": "Mostrando la página _PAGE_ de _PAGES_",
                                        "infoEmpty": "No records available",
                                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                                        "search": "Buscar:",
                                        "paginate":
                                            {
                                            "next": "Siguiente",
                                            "previous": "Anterior",
                                            }     
                                    },
                                });
                                });
                                </script>
                            @endsection
                        </div>
                    </div>
                </div>
                {!! $categorias->links() !!}
            </div>
        </div>
    </div>
    </div>
      </div>
    </div>
  </div>
</div>
@endsection