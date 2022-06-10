@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => __('Trabajadores')])
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
                                        &nbsp;  
                                        <a href="{{ url('trabajadores/pdf') }}" class="btn btn-sm btn-danger" >
                                            {{ __('PDF') }}
                                        </a>
                                        <a href="{{ url('trabajadores/create') }}"  class="btn btn-sm btn-facebook">
                                            {{ __('Añadir trabajador') }}
                                        </a>
                                    </div>
                                </div>
                            </div>                        
                            @if(Session::has('mensaje'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{Session::get('mensaje')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="lose">
                                    <span aria-hidden="true">&times; </span>
                                </button>
                            </div>
                            @endif    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="table">
                                        <thead class="text-primary">
                                            <tr>
                                            <th>#</th>
                                            <th>Avatar</th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Fecha Salida</th>
                                            <th>Sueldo</th>
                                            <th>Cargo</th>        
                                            <th>Empresa</th>                                       
                                            <th class="text-right"> Acciones </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($trabajadore as $trabajadore)
                                            <tr>
                                            <td>{{ $trabajadore->id}}</td>
                                            
                                            <td>
                                                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$trabajadore->imagen}}" width="150" alt="">
                                                
                                            </td>
                                            <td>{{ $trabajadore->rut_usuario}}</td>
                                            <td>{{ $trabajadore->nombre}}</td>
                                            <td>{{ $trabajadore->direccion}}</td>
                                            <td>{{ $trabajadore->telefono}}</td>
                                            <td>{{ $trabajadore->email}}</td>
                                            <td>{{ $trabajadore->fecha_ingreso}}</td>
                                            <td>{{ $trabajadore->fecha_salida}}</td>
                                            <td>{{ $trabajadore->sueldo}}</td>
                                            <td>{{ $trabajadore->cargo}}</td>  
                                            <td>{{ $trabajadore->empresas->nombre}}</td>     

                                            <td class="td-actions text-right">
                                                <a class="btn btn-sm btn-primary " href="{{ route('trabajadores.show',$trabajadore->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                <a class="btn btn-sm btn-success" href="{{ url('/trabajadores/'.$trabajadore->id.'/edit') }}" class="btn btn-info"><i class="material-icons">edit</i></a>
                                                
                                                <form action="{{ url('/trabajadores/'.$trabajadore->id) }}" class="d-inline" method="post" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                                    @csrf
                                                    {{ method_field('DELETE')}}
                                                        
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
                    </div>                  
                </div>           
            </div>    
        </div>
    </div>
    </div>
</div>
</div>
@endsection