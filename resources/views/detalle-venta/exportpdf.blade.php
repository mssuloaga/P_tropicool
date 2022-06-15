@extends('layouts.exportpdf')

@section('content')
    <tr>
        <th>Nombre</th>
        <th>direccion</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($empresas as $key => $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->direccion }}</td>
                
            </tr>
        @endforeach
    </tbody>
@endsection
