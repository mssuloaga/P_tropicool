@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Categoría'])
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
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="col-12 text-right">
                            <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-facebook">Añadir categoría</a>
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
                            <table class="table ">
                                <thead class="text-primary">
                                    <tr>
                                        <th>ID</th>
										<th>Nombre</th>
										<th>Empresa</th>
										
                                        <th class="text-right"> Acciones </th>
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
                                                    <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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