<div class="card-body">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                {{ Form::text('nombre', $categoria->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        </div>
        
        <div class="row">
            <label class="col-sm-2 col-form-label">Empresa</label>
                <div class="col-sm-7">
                    <select name="id_empresas" id="input" class="form-control">
                        <option value="">Seleccione empresa</option>
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}">{{$empresa['nombre']}}</option>
                        @endforeach
                    </select>
            </div>
        </div> 
</div> 

<div class="row text-center">
        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <div class="m-4">
                <a href="{{ route('categorias.index') }}" class="btn btn-success mr-3"> Volver </a>                
            </div>
        </div>
    </div>
             