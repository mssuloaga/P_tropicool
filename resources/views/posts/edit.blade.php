@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Editar Post'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Publicación</h4>
              <p class="card-category">Editar datos</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Detalle Publicación</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el title"
                    value="{{ old('title', $post->title) }}" autocomplete="off" autofocus>
                    @if ($errors->has('title'))
                    <span class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--End body-->
            <!--Footer-->
            <div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('posts.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
    </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
@endsection