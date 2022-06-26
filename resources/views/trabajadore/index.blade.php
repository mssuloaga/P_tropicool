@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => 'Trabajadores'])

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
            <h4 class="card-title">Trabajadores</h4>
            <p class="card-category">Lista de trabajadores registrados</p>
          </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="col-12 text-right">
                            <a href="{{ route('trabajadores.create') }}" class="btn btn-sm btn-facebook">Añadir trabajador</a>
                        </div>
                        
                    </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped shadow-lg mt-4" style="width:100%" id="trabajadores">
                                <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
										<th>Imagen</th>
										<th>Rut</th>
										<th>Nombre</th>
										<th>Dirección</th>
										<th>Teléfono</th>
										<th>Correo</th>
										<th>Fecha Ingreso</th>
										<th>Sueldo</th>
										<th>Cargo</th>
										<th>Empresa</th>
										
                                        <th class="text-right no-exportar"> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trabajadores as $trabajadore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $trabajadore->imagen }}</td>
											<td>{{ $trabajadore->rut_trabajador }}</td>
											<td>{{ $trabajadore->nombre }}</td>
											<td>{{ $trabajadore->direccion }}</td>
											<td>{{ $trabajadore->telefono }}</td>
											<td>{{ $trabajadore->email }}</td>
											<td>{{ $trabajadore->fecha_ingreso }}</td>
											<td>{{ $trabajadore->sueldo }}</td>
											<td>{{ $trabajadore->cargo }}</td>
											<td>{{ $trabajadore->empresa->nombre }}</td>

                                            <td class="td-actions text-right">
                                                
                                                    <a class="btn btn-sm btn-primary " href="{{ route('trabajadores.show',$trabajadore->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('trabajadores.edit',$trabajadore->id) }}" class="btn btn-info"><i class="material-icons">edit</i></a>
                                                    <form action="{{ route('trabajadores.destroy',$trabajadore->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
                                $('#trabajadores').DataTable(
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
                                            title: "Trabajadores",
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
                                            title: "Trabajadores",
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
                                            title: "<center>Trabajadores</center>",
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
                {!! $trabajadores->links() !!}
            </div>
        </div>
    </div>
    </div>
      </div>
    </div>
  </div>
</div>
@endsection