<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
    <link rel="stylesheet" href="{{public_path('resources\css\app.css')}}" type="text/css">
</head>
<body>
    <h4>Tabla de trabajadores</h4>
    <hr>

    <style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
    }
</style>

    <table id="customers" class="table table-striped table-hover separados color">
                                   
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>                                      
                                            <th>Avatar</th>
                                            <th>Rut</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Fecha Salida</th>
                                            <th>Sueldo</th>
                                            <th>Cargo</th>     
                                            <th>Empresa</th>                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($trabajadore as $trabajadore)
                                        <tr>
                                            <td>{{ $trabajadore->id}}</td>
                                            
                                           
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
                                            
                                        @endforeach
                                    </tbody>
                                </table>
</body>
</html>