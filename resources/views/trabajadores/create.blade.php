
@extends('layouts.main', ['activePage' => 'trabajadores', 'titlePage' => __('Trabajadore')])
@section('content')

<br><br>
<div class="container">

    <form action="{{ url('/trabajadores') }}" method="post" enctype="multipart/form-data" >
        @csrf
        @include('trabajadores.form', ['modo'=>'Crear']));
    
    </form>

</div>
@endsection