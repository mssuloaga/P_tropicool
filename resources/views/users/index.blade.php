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
                    <p class="card-category">Lista de usuarios registrados</p>
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
                        @endcan
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped shadow-lg mt-4" style="width:100%" id="users">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Imagen</th>
                          <th>Nombre</th>
                          <th>Correo</th>
                          <th>Nombre Usuario</th>
                          <th>Nombre Completo</th>
                          <th>Roles</th>
                          <th class="text-right no-exportar">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                            <tr>
                              <td>{{ $user->id }}</td>
                              <td><img src="{{ asset('uploads/usuarios/'.$user->image) }}" width="70px" height="70px" alt="Imagen"></td>
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
                          <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
                          <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
                          <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
                          <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
                          <script>
                            $(document).ready(function () {
                            $('#users').DataTable({
                                    responsive:"true",
                                    dom: 'Bftirl',
                                    buttons: [
                                    {
                                        extend: 'excelHtml5',
                                        text: '<a href=""><img class="logo d-inline-block align-top" width="40px" src="img/excel.png"/></a>',
                                        titleAttr:'Exportar Excel',
                                        className: 'btn-success',
                                        title: "Usuarios",
                                        exportOptions: {
                                          columns: ":not(.no-exportar)"
                                        }
                                    },
                                    {
                                        extend: 'pdfHtml5',
                                        text: '<a href=""><img class="logo d-inline-block align-top" width="40px" src="img/pdf.png"/></a>',
                                        titleAttr:'Exportar Excel',
                                        className: 'btn-xs btn-danger',
                                        title: "Usuarios",
                                        exportOptions: {
                                          columns: ":not(.no-exportar)"
                                        }
                                    },
                                    {
                                        extend: 'print',
                                        text: '<a href=""><img class="logo d-inline-block align-top" width="40px" src="img/print.png"/></a>',
                                        titleAttr:'Imprimir',
                                        className: 'btn-primary',
                                        title: "<center>Usuarios</center>",
                                        exportOptions: {
                                        columns: ":not(.no-exportar)"
                                        }
                                    }
                                    
                                            ],    
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
                                                },
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
