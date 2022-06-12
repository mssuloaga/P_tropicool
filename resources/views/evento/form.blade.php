
<div class="card-body">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                    {{ Form::text('nombre', $evento->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>
        
        <div class="row">
            <label class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-7">
                    {{ Form::text('direccion', $evento->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>  
            
        <div class="row">
            <label class="col-sm-2 col-form-label">Trabajador</label>
                <div class="col-sm-7">
                    <select name="id_trabajadores" id="input" class="form-control">
                        <option value="">Seleccione trabajador</option>
                        @foreach ($trabajadores as $trabajadore)
                            <option value="{{ $trabajadore['id'] }}">{{$trabajadore['nombre']}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        

        <div class="row">
            <label class="col-sm-2 col-form-label">Fecha Inicio</label>
                <div class="col-sm-7">
                    {{ Form::date('fecha_inicio', $evento->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'fecha inicio']) }}
                    {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Fecha Término</label>
                <div class="col-sm-7">
                    {{ Form::date('fecha_termino', $evento->fecha_termino, ['class' => 'form-control' . ($errors->has('fecha_termino') ? ' is-invalid' : ''), 'placeholder' => 'fecha término']) }}
                    {!! $errors->first('fecha_termino', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-7">
                    {{ Form::text('precio', $evento->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'precio']) }}
                    {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

    
    </div>
    
    <div class="row text-center">
        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <div class="m-4">
                <a href="{{ route('eventos.index') }}" class="btn btn-success mr-3"> Volver </a>                
            </div>
        </div>
    </div>
                 