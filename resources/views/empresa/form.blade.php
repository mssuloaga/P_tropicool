    <div class="card-body">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                    {{ Form::text('nombre', $empresa->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>
        
        <div class="row">
            <label class="col-sm-2 col-form-label">Logo</label>
                <div class="col-sm-7">
                    {{ Form::text('logo', $empresa->logo, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'Logo']) }}
                    {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>  
            
        <div class="row">
            <label class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-7">
                    {{ Form::text('direccion', $empresa->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
                    {{ Form::text('telefono', $empresa->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Misión</label>
                <div class="col-sm-7">
                    {{ Form::text('mision', $empresa->mision, ['class' => 'form-control' . ($errors->has('mision') ? ' is-invalid' : ''), 'placeholder' => 'Mision']) }}
                    {!! $errors->first('mision', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Visión</label>
                <div class="col-sm-7">
                    {{ Form::text('vision', $empresa->vision, ['class' => 'form-control' . ($errors->has('vision') ? ' is-invalid' : ''), 'placeholder' => 'Vision']) }}
                    {!! $errors->first('vision', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-7">
                    {{ Form::text('descripcion', $empresa->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Instagram</label>
                <div class="col-sm-7">
                    {{ Form::text('instagram', $empresa->instagram, ['class' => 'form-control' . ($errors->has('instagram') ? ' is-invalid' : ''), 'placeholder' => 'Instagram']) }}
                    {!! $errors->first('instagram', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Facebook</label>
                <div class="col-sm-7">
                    {{ Form::text('facebook', $empresa->facebook, ['class' => 'form-control' . ($errors->has('facebook') ? ' is-invalid' : ''), 'placeholder' => 'Facebook']) }}
                    {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>
    </div>
    
    <div class="row text-center">
        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <div class="m-4">
                                    <a href="{{ route('empresas.index') }}" class="btn btn-success mr-3"> Volver </a>                
                                </div>
        </div>
    </div>
                    
    
    