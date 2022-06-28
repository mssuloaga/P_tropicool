@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Permisos'])

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Permisos</h4>
                  <p class="card-category">Lista de permisos registrados</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 text-right">
                    @can('permission_create')
                      <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-facebook">Añadir permiso</a>
                    @endcan
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped shadow-lg mt-4" style="width:100%" id="permisos">
                      <thead class="text-primary">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Guard</th>
                        <th>Fecha de Creación</th>
                        <th class="text-right no-exportar">Acciones</th>
                      </thead>
                      <tbody>
                        @forelse ($permissions as $permission)
                        <tr>
                          <td>{{ $permission->id }}</td>
                          <td>{{ $permission->name }}</td>
                          <td>{{ $permission->guard_name }}</td>
                          <td>{{ $permission->created_at }}</td>
                          <td class="td-actions text-right">
                            @can('permission_show')
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info"><i
                                class="material-icons">person</i></a>
                            @endcan
                            @can('permission_edit')
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"><i
                                class="material-icons">edit</i></a>
                            @endcan
                            @can('permission_destroy')
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" rel="tooltip">
                                <i class="material-icons">close</i>
                              </button>
                            </form>
                            @endcan
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="2">Sin registros.</td>
                        </tr>
                        @endforelse
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
                        $('#permisos').DataTable(
                                {
                                    responsive:"true",
                                    dom: 'Bftirl',
                                    buttons: 
                                    [
                                        {
                                            extend: 'excelHtml5',
                                            text: '<a href=""><img class="logo d-inline-block align-top" width="40px" src="img/excel.png"/></a>',
                                            titleAttr:'Exportar Excel',
                                            className: 'btn-success',
                                            title: "Permisos",
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
                                            title: "Permisos",
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
                                            title: "<center>Permisos</center>",
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
                <div class="card-footer mr-auto">
                  {{ $permissions->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
