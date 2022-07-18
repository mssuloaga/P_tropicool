
<div class="card-body">
        
    <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
    </div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-7">
            {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div></div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-7">
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div></div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-7">
            {{ Form::text('cantidad', $producto->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div></div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Imagen</label>
            <div class="col-sm-7">
                @if(isset($producto->imagen))
                @endif
                    <input type="file" class="form-control" name="imagen" value=" " id="imagen">
            </div></div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Categoría</label>
                <div class="col-sm-7">
                    <select name="id_categorias" id="input" class="form-control">
                        
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria['id'] }}">{{$categoria['nombre']}}</option>
                        @endforeach
                    </select>
            </div>
        </div> 
</div>


<div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-success ms-3"> Volver </a>                    
        </div>                   
    </div>