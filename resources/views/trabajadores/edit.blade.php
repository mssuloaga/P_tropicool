@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Trabajador')])
@section('content')
<div class="container">
    <form action="{{ url('/trabajadores/'.$trabajadore->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('trabajadores.form',['modo'=>'Editar']);
    </form>
</div>
@endsection