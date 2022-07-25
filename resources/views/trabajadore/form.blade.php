
<div class="card-body">
        
    <div class="row">
        <label  class="col-sm-2 col-form-label">Imagen</label>
            <div class="col-sm-7">
                @if(isset($trabajadore->imagen))
                @endif
                    <input type="file" class="form-control" name="imagen" value=" " id="imagen">
            </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Rut</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="rut_trabajador" placeholder="Ingrese el rut del trabajador " value="{{ old('rut_trabajador', $trabajadore->rut_trabajador) }}" autofocus>
                    @if ($errors->has('rut_trabajador'))
                      <span class="error text-danger" for="input-rut_trabajador">{{ $errors->first('rut_trabajador') }}</span>
                    @endif
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del trabajador" value="{{ old('nombre', $trabajadore->nombre) }}" autofocus>
                    @if ($errors->has('nombre'))
                      <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                    @endif
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección del trabajador" value="{{ old('direccion', $trabajadore->direccion) }}" autofocus>
                    @if ($errors->has('direccion'))
                      <span class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                    @endif
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono del trabajador" value="{{ old('telefono', $trabajadore->telefono) }}" autofocus>
                    @if ($errors->has('telefono'))
                      <span class="error text-danger" for="input-telefono">{{ $errors->first('telefono') }}</span>
                    @endif
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" placeholder="Ingrese el correo del trabajador" value="{{ old('email', $trabajadore->email) }}" autofocus>
                    @if ($errors->has('email'))
                      <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                    @endif
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Fecha Ingreso</label>
                <div class="col-sm-7">
            {{ Form::date('fecha_ingreso', $trabajadore->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Sueldo</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="sueldo" placeholder="Ingrese el sueldo del trabajador" value="{{ old('sueldo', $trabajadore->sueldo) }}" autofocus>
                    @if ($errors->has('sueldo'))
                      <span class="error text-danger" for="input-sueldo">{{ $errors->first('sueldo') }}</span>
                    @endif
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Cargo</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="cargo" placeholder="Ingrese el cargo del trabajador" value="{{ old('cargo', $trabajadore->cargo) }}" autofocus>
                    @if ($errors->has('cargo'))
                      <span class="error text-danger" for="input-cargo">{{ $errors->first('cargo') }}</span>
                    @endif
        </div>
    </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Empresa</label>
                <div class="col-sm-7">
                    <select name="id_empresas" id="input" class="form-control">
                        
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}">{{$empresa['nombre']}}</option>
                        @endforeach
                    </select>
            </div>
        </div> 

        <div class="row">
            <label  class="col-sm-2 col-form-label">Curriculum</label>
                <div class="col-sm-7">
                    @if(isset($trabajadore->curriculum))
                    @endif
                        <input type="file" class="form-control" name="curriculum" value=" " id="curriculum">
                </div>
        </div>

</div>

<div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('trabajadores.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
</div>
             