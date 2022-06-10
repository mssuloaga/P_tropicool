@extends('layouts.main', ['activePage' => 'empresas', 'titlePage' => 'Detalles de los trabajadores'])

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Trabajador</div>
                            <p class="card-category">Vista detallada del trabajador: {{ $trabajadore->nombre }}</p>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                               

                                    <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <td>{{ $trabajadore->id}}</td>
                                        </tr>

                                        <tr>                                        
                                            <th>Avatar</th>
                                            <td>{{ $trabajadore->imagen}}</td>   
                                        </tr>                                         
                                        
                                        <tr>
                                            <th>Rut</th>
                                            <td>{{ $trabajadore->rut_usuario}}</td>                                        
                                        </tr>

                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $trabajadore->nombre}}</td>                                    
                                        </tr>

                                        <tr>
                                            <th>Direccion</th>
                                            <td>{{ $trabajadore->direccion}}</td>
                                        </tr>
                                            
                                        <tr>   
                                            <th>Telefono</th>
                                            <td>{{ $trabajadore->telefono}}</td>
                                        </tr> 
                                        
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $trabajadore->email}}</td>
                                        </tr>                                

                                        <tr>
                                            <th>Fecha Ingreso</th>
                                            <td>{{ $trabajadore->fecha_ingreso}}</td>
                                        </tr>

                                        <tr>
                                            <th>Fecha Salida</th>
                                            <td>{{ $trabajadore->fecha_salida}}</td>
                                        </tr>                                          
                           
                                        <tr>
                                            <th>Sueldo</th>                                            
                                            <td>{{ $trabajadore->sueldo}}</td>
                                        </tr>
                                           
                                        <tr>
                                            <th>Cargo</th>
                                            <td>{{ $trabajadore->cargo}}</td> 
                                        </tr>

                                        <tr>
                                            <th>Empresa</th>
                                            <td>{{ $trabajadore->empresas->nombre}}</td>  
                                        </tr>
                                            
                                             
                                            
                                        
                                    </tbody>
                        
                        </table>
                    </div>
                    
                    <div class="card-footer ">
                        <div class="button-container">
                            <a href="{{ url('trabajadores/') }}" class="btn btn-sm btn-success mr-3"> Volver </a>                
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

