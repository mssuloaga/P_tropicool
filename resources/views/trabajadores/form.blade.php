<br><br>


<h2>{{ $modo }} trabajador</h2>


@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>        
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>   
@endif

<div class="form-group">
    <label for="imagen"> Subir imagen</label>
    @if(isset($trabajadore->imagen))    
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$trabajadore->imagen}}" alt="" width="150">
    @endif
    <input type="file" class="form-control" name="imagen" value=" " id="imagen">

   


    
    
</div>

<div class="form-group">
    <label for="rut_usuario"> Rut</label>
    <input type="text" class="form-control" name="rut_usuario" value="{{ isset($trabajadore->rut_usuario)?$trabajadore->rut_usuario:old('rut_usuario')}}" id="rut_usuario">
</div>

<div class="form-group">
    <label for="nombre"> Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($trabajadore->nombre)?$trabajadore->nombre:old('nombre')}}" id="nombre" >
</div>

<div class="form-group">
    <label for="direccion"> Direccion</label>
    <input type="text" class="form-control" name="direccion" value="{{ isset($trabajadore->direccion)?$trabajadore->direccion:old('direccion')}}" id="direccion" >
</div>

<div class="form-group">
    <label for="telefono"> Telefono</label>
    <input type="text" class="form-control" name="telefono" value="{{ isset($trabajadore->telefono)?$trabajadore->telefono:old('telefono')}}" id="telefono" >
</div>

<div class="form-group">
    <label for="email"> Email</label>
    <input type="text" class="form-control" name="email" value="{{ isset($trabajadore->email)?$trabajadore->email:old('email')}}" id="email" >
</div>

<div class="form-group">
    <label for="fecha_ingreso"> Fecha Ingreso</label>
    <input type="date" class="form-control" name="fecha_ingreso" value="{{ isset($trabajadore->fecha_ingreso)?$trabajadore->fecha_ingreso:old('fecha_ingreso') }}" id="fecha_ingreso">
</div>

<div class="form-group">
    <label for="fecha_salida"> Fecha Salida</label>
    <input type="date" class="form-control" name="fecha_salida" value="{{ isset($trabajadore->fecha_salida)?$trabajadore->fecha_salida:old('fecha_salida')}}" id="fecha_salida">
</div>

<div class="form-group">
    <label for="sueldo"> Sueldo</label>
    <input type="text" class="form-control" name="sueldo" value="{{ isset($trabajadore->sueldo)?$trabajadore->sueldo:old('sueldo')}}" id="sueldo" >
</div>

<div class="form-group">
    <label for="cargo"> Cargo</label>
    <input type="text" class="form-control" name="cargo" value="{{ isset($trabajadore->cargo)?$trabajadore->cargo:old('cargo')}}" id="cargo" >
</div>



<div class="form-group">
            {{ Form::label('id_empresas') }}
            {{ Form::select('id_empresas',$empresa, $trabajadore->id_empresas, ['class' => 'form-control' . ($errors->has('id_empresas') ? ' is-invalid' : ''), 'placeholder' => 'Id Trabajador']) }}
            {!! $errors->first('id_empresas', '<div class="invalid-feedback">:message</div>') !!}
</div>  


<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('trabajadores/')}}">Regresar</a>