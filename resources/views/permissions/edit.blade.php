@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Editar permiso'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Permiso</h4>
              <p class="card-category">Editar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" value="{{ old('name', $permission->name) }}" autofocus>
                  @if ($errors->has('name'))
                  <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
    </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection