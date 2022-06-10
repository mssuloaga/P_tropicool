
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>        
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>   
@endif
<div class="card-body">
   

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="imagen"> Subir imagen</label>
            <div class="col-sm-7">
                @if(isset($trabajadore->imagen))
                @endif
                    <input type="file" class="form-control" name="imagen" value=" " id="imagen">
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="rut_usuario">Rut</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="rut_usuario" value="{{ isset($trabajadore->rut_usuario)?$trabajadore->rut_usuario:old('rut_usuario')}}" id="rut_usuario">
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="nombre" value="{{ isset($trabajadore->nombre)?$trabajadore->nombre:old('nombre')}}" id="nombre" >
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="direccion">Dirección</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="direccion" value="{{ isset($trabajadore->direccion)?$trabajadore->direccion:old('direccion')}}" id="direccion" >
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="telefono">Teléfono</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="telefono" value="{{ isset($trabajadore->telefono)?$trabajadore->telefono:old('telefono')}}" id="telefono" >
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="email">Correo</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="email" value="{{ isset($trabajadore->email)?$trabajadore->email:old('email')}}" id="email" >
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="fecha_ingreso">Fecha ingreso</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha_ingreso" value="{{ isset($trabajadore->fecha_ingreso)?$trabajadore->fecha_ingreso:old('fecha_ingreso') }}" id="fecha_ingreso">
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="fecha_salida">Fecha salida</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha_salida" value="{{ isset($trabajadore->fecha_salida)?$trabajadore->fecha_salida:old('fecha_salida')}}" id="fecha_salida">
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="sueldo">Sueldo</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="sueldo" value="{{ isset($trabajadore->sueldo)?$trabajadore->sueldo:old('sueldo')}}" id="sueldo" >
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label" for="cargo">Cargo</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="cargo" value="{{ isset($trabajadore->cargo)?$trabajadore->cargo:old('cargo')}}" id="cargo" >
            </div>
    </div>

    <div class="row">
        <label  class="col-sm-2 col-form-label"> Empresa</label>
            <div class="col-sm-7">
                {{ Form::select('id_empresas',$empresa, $trabajadore->id_empresas, ['class' => 'form-control' . ($errors->has('id_empresas') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Empresa']) }}
                {!! $errors->first('id_empresas', '<div class="invalid-feedback">:message</div>') !!}
            </div>
    </div>
</div>

<div class="row text-center">
        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <div class="m-4">
                <a class="btn btn-success" href="{{ url('trabajadores/')}}">Volver</a>
           </div>
        </div>
</div>
