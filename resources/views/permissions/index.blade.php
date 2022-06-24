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
                  <p class="card-category">Permisos registrados</p>
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
                        <th>Created_at</th>
                        <th class="text-right">Acciones</th>
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

                      <script>
                        $(document).ready(function () {
                        $('#permisos').DataTable({
                              "language": {
                              "lengthMenu": "Mostrar _MENU_ registros por página",
                              "zeroRecords": "No hay coincidencias - Verifique",
                              "info": "Mostrando la página _PAGE_ de _PAGES_",
                              "infoEmpty": "No records available",
                              "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                              "search": "Buscar:",
                              "paginate":{
                                "next": "Siguiente",
                                "previous": "Anterior",
                              }
                                          }
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
