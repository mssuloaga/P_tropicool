@extends('layouts.main', ['activePage' => 'empresas', 'titlePage' => 'Empresas'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Empresas</h4>
            <p class="card-category">Lista de empresas registradas</p>
          </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="col-12 text-right">
                            <a href="{{ route('empresas.create') }}" class="btn btn-sm btn-facebook">Añadir empresa</a>
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
										<th>Logo</th>
										<th>Dirección</th>
										<th>Teléfono</th>
										<th>Misión</th>
										<th>Visión</th>
										<th>Descripción</th>
										<th>Instagram</th>
										<th>Facebook</th>
                                        <th class="text-right"> Acciones </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empresa->nombre }}</td>
											<td>{{ $empresa->logo }}</td>
											<td>{{ $empresa->direccion }}</td>
											<td>{{ $empresa->telefono }}</td>
											<td>{{ $empresa->mision }}</td>
											<td>{{ $empresa->vision }}</td>
											<td>{{ $empresa->descripcion }}</td>
											<td>{{ $empresa->instagram }}</td>
											<td>{{ $empresa->facebook }}</td>

                                            <td class="td-actions text-right">
                                                
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empresas.show',$empresa->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empresas.edit',$empresa->id) }}" class="btn btn-info"><i class="material-icons">edit</i></a>
                                                    <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
                {!! $empresas->links() !!}
            </div>
        </div>
    </div>
    </div>
      </div>
    </div>
  </div>
</div>
@endsection