<div class="card-body">
        
    <div class="row">
        <label  class="col-sm-2 col-form-label">Cantidad</label>
            <div class="col-sm-7">
                {{ Form::text('cantidad', $stock->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
    </div>
    
    <div class="row">
            <label  class="col-sm-2 col-form-label">Producto</label>
            <div class="col-sm-7">
                    <select name="id_productos" id="input" class="form-control">
                        <option value="">Seleccione producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto['id'] }}">{{$producto['nombre']}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
    <div>

</div>

<div class="row text-center">
        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <div class="m-4">
                <a href="{{ route('stocks.index') }}" class="btn btn-success mr-3"> Volver </a>                
            </div>
        </div>
    </div>