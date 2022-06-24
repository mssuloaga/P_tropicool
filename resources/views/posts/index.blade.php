@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Posts'])

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Posts</h4>
            <p class="card-category">Lista de posts registrados en la base de datos</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-right">
                @can('post_create')
                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-facebook">Añadir post</a>
                @endcan
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped shadow-lg mt-4" style="width:100%" id="posts">
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Fecha de creación </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="text-primary">{{ $post->created_at->toFormattedDateString() }}</td>
                    <td class="td-actions text-right">
                    @can('post_show')
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info"> <i
                          class="material-icons">person</i> </a>
                    @endcan
                    @can('post_edit')
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success"> <i
                          class="material-icons">edit</i> </a>
                    @endcan
                    @can('post_destroy')
                      <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                        onsubmit="return confirm('areYouSure')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">
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
                  $('#posts').DataTable({
                              "language": {
                              "lengthMenu": "Mostrar _MENU_ registros por pagina",
                              "zeroRecords": "No hay coincidencias - Verifique",
                              "info": "Mostrando la pagina _PAGE_ de _PAGES_",
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
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            {{ $posts->links() }}
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
