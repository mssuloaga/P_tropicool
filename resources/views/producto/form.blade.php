
<div class="card-body">
        
    <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del producto" value="{{ old('nombre') }}" autofocus>
                    @if ($errors->has('nombre'))
                      <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                    @endif
                </div>
    </div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="descripcion" placeholder="Ingrese la descripción" value="{{ old('descripcion') }}" autofocus>
                    @if ($errors->has('descripcion'))
                      <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                    @endif
        </div></div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="precio" placeholder="Ingrese el preocio del producto" value="{{ old('precio') }}" autofocus>
                    @if ($errors->has('precio'))
                      <span class="error text-danger" for="input-precio">{{ $errors->first('precio') }}</span>
                    @endif
        </div></div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="cantidad" placeholder="Ingrese la cantidad en stock" value="{{ old('cantidad') }}" autofocus>
                    @if ($errors->has('cantidad'))
                      <span class="error text-danger" for="input-cantidad">{{ $errors->first('cantidad') }}</span>
                    @endif
        </div></div>

        <div class="row">
            <label  class="col-sm-2 col-form-label">Imagen Presentacion</label>
            <div class="col-sm-7">
                @if(isset($producto->imagen))
                @endif
                    <input type="file" class="form-control" name="imagen" value=" " id="imagen">
            </div></div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Imagenes galeria</label>
                         
                <div class="col-sm-7">
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
            
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
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
    </div>