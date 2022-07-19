
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
            {{ Form::text('rut_trabajador', $trabajadore->rut_trabajador, ['class' => 'form-control' . ($errors->has('rut_trabajador') ? ' is-invalid' : ''), 'placeholder' => 'Rut trabajador']) }}
            {!! $errors->first('rut_trabajador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
            {{ Form::text('nombre', $trabajadore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-7">
            {{ Form::text('direccion', $trabajadore->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
            {{ Form::text('telefono', $trabajadore->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
            {{ Form::email('email', $trabajadore->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
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
            {{ Form::text('sueldo', $trabajadore->sueldo, ['class' => 'form-control' . ($errors->has('sueldo') ? ' is-invalid' : ''), 'placeholder' => 'Sueldo']) }}
            {!! $errors->first('sueldo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="row">
            <label  class="col-sm-2 col-form-label">Cargo</label>
                <div class="col-sm-7">
            {{ Form::text('cargo', $trabajadore->cargo, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
            {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
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
</div>

<div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('trabajadores.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
</div>
             