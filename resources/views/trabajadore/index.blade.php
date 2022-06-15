@extends('layouts.app')

@section('template_title')
    Trabajadore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="col-12 text-right">
                            <a href=""><img class="logo d-inline-block align-top" width="40px" src="img/excel.png"/></a>
                            <a href="download_pdftrabajadores"><img class="logo d-inline-block align-top" width="34px" src="img/pdf.png"/></a>
                            <a href="{{ route('trabajadores.create') }}" class="btn btn-sm btn-facebook">Añadir trabajador</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Imagen</th>
										<th>Rut Usuario</th>
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Telefono</th>
										<th>Email</th>
										<th>Fecha Ingreso</th>
										<th>Fecha Salida</th>
										<th>Sueldo</th>
										<th>Cargo</th>
										<th>Id Empresas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trabajadores as $trabajadore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $trabajadore->imagen }}</td>
											<td>{{ $trabajadore->rut_usuario }}</td>
											<td>{{ $trabajadore->nombre }}</td>
											<td>{{ $trabajadore->direccion }}</td>
											<td>{{ $trabajadore->telefono }}</td>
											<td>{{ $trabajadore->email }}</td>
											<td>{{ $trabajadore->fecha_ingreso }}</td>
											<td>{{ $trabajadore->fecha_salida }}</td>
											<td>{{ $trabajadore->sueldo }}</td>
											<td>{{ $trabajadore->cargo }}</td>
											<td>{{ $trabajadore->id_empresas }}</td>

                                            <td>
                                                <form action="{{ route('trabajadores.destroy',$trabajadore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('trabajadores.show',$trabajadore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('trabajadores.edit',$trabajadore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $trabajadores->links() !!}
            </div>
        </div>
    </div>
@endsection
