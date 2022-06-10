@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => __('Trabajadore')])
@section('content')
<br><br>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Trabajador') }}
                            </span>

                             <div class="float-right">                             
                                <a href="{{ url('trabajadores/pdf') }}" class="btn btn-primary btn-sm"  data-placement="left">
                                {{ __('PDF') }}
                                </a>
                                &nbsp;

                             

                                <a href="{{ url('trabajadores/create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar') }}
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
                                <table id="Tabla1" class="table table-striped table-hover">
                                    <thead class="thead">
                                    <thead class="thead-light">
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
                                            <th>Acciones</th>
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
                                            <td>
                                                <a href="{{ url('/trabajadores/'.$trabajadore->id.'/edit') }}" class="btn btn-warning ">
                                                <span class="material-icons">edit</span> 
                                                </a>

                                  
                                                
                                                    <form action="{{ url('/trabajadores/'.$trabajadore->id) }}" class="d-inline" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE')}}
                                                        
                                                        <input type="submit" class="btn btn-danger material-icons "  onclick="return confirm('¿Quieres borrar?')"
                                                        value="delete"  >
                                                    
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
    @endsection