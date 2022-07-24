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
										<th>Fotografía</th>
										<th>Rut</th>
										<th>Nombre</th>
										<th>Dirección</th>
										<th>Teléfono</th>
										<th>Correo</th>
										<th>Fecha Ingreso</th>
										<th>Sueldo</th>
										<th>Cargo</th>
										<th>Empresa</th>
                                        <th>Curriculum</th>
										
                                        <th class="text-right no-exportar"> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trabajadores as $trabajadore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td><img src="{{ asset('uploads/trabajadores/'.$trabajadore->imagen) }}" width="70px" height="70px" alt="Image"></td>
											<td>{{ $trabajadore->rut_trabajador }}</td>
											<td>{{ $trabajadore->nombre }}</td>
											<td>{{ $trabajadore->direccion }}</td>
											<td>{{ $trabajadore->telefono }}</td>
											<td>{{ $trabajadore->email }}</td>
											<td>{{ $trabajadore->fecha_ingreso }}</td>
											<td>{{ $trabajadore->sueldo }}</td>
											<td>{{ $trabajadore->cargo }}</td>
											<td>{{ $trabajadore->empresa->nombre }}</td>
                                            <td><a class="btn btn-sm btn-danger" target="_blank" href="{{ asset('uploads/trabajadores/'.$trabajadore->curriculum) }}" class="btn btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                                    <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                                </svg>
                                            </a></td>
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