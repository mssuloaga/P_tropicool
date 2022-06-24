@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuarios'])

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
                    <h4 class="card-title">Usuarios</h4>
                    <p class="card-category">Usuarios registrados</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        @can('user_create')
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-facebook">Añadir usuario</a>
                        <a href="download_pdfusers" class="btn btn-sm btn-facebook">PDF</a>
                        @endcan
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped shadow-lg mt-4" style="width:100%" id="users">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Correo</th>
                          <th>Username</th>
                          <th>Full Name</th>
                          <th>Roles</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                            <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->fullname }}</td>
                              <td>
                                  @forelse ($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                  @empty
                                    <span class="badge badge-danger">No roles</span>
                                  @endforelse
                                </td>
                              <td class="td-actions text-right">
                                @can('user_show')
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                @endcan
                                @can('user_edit')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                @endcan
                                @can('user_destroy')
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                                @endcan
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @section('js')
                          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                          <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                          <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

                          <script>
                            $(document).ready(function () {
                            $('#users').DataTable({
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
                    {{ $users->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
