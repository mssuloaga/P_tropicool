@extends('layouts.main')
@section('title','Importar datos')

@section('content')

    <form action="{{ url('productos/importData')}}"></form>
    
@endsection