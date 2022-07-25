    <div class="card-body">
        <div class="row">
            <label  class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre de la empresa" value="{{ old('nombre', $empresa->nombre) }}" autofocus>
                  @if ($errors->has('nombre'))
                    <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                  @endif
                </div>
        </div>
        
        <div class="row">
            <label  class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-7">
                @if(isset($empresa->logo))
                @endif
                    <input type="file" class="form-control" name="logo" value=" " id="logo">
            </div></div> 
            
        <div class="row">
            <label class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección " value="{{ old('direccion', $empresa->direccion) }}" autofocus>
                  @if ($errors->has('direccion'))
                    <span class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                  @endif
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono de la empresa" value="{{ old('telefono', $empresa->telefono) }}" autofocus>
                  @if ($errors->has('telefono'))
                    <span class="error text-danger" for="input-telefono">{{ $errors->first('telefono') }}</span>
                  @endif
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Misión</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="mision" placeholder="Ingrese la misión de la empresa" value="{{ old('mision', $empresa->mision) }}" autofocus>
                  @if ($errors->has('mision'))
                    <span class="error text-danger" for="input-mision">{{ $errors->first('mision') }}</span>
                  @endif
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Visión</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="vision" placeholder="Ingrese la visión de la empresa" value="{{ old('vision', $empresa->vision) }}" autofocus>
                  @if ($errors->has('vision'))
                    <span class="error text-danger" for="input-vision">{{ $errors->first('vision') }}</span>
                  @endif
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="descripcion" placeholder="Ingrese descripción de la empresa" value="{{ old('descripcion', $empresa->descripcion) }}" autofocus>
                  @if ($errors->has('descripcion'))
                    <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                  @endif
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Instagram</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="instagram" placeholder="Ingrese el instagram de la empresa" value="{{ old('instagram', $empresa->instagram) }}" autofocus>
                  @if ($errors->has('instagram'))
                    <span class="error text-danger" for="input-instagram">{{ $errors->first('instagram') }}</span>
                  @endif
                </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Facebook</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="facebook" placeholder="Ingrese el facebook de la empresa" value="{{ old('facebook', $empresa->facebook) }}" autofocus>
                  @if ($errors->has('facebook'))
                    <span class="error text-danger" for="input-facebook">{{ $errors->first('facebook') }}</span>
                  @endif
                </div>
        </div>
       
    </div>
    
    
    <div class="row">
        <div class="text-center p-4">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('empresas.index') }}" class="btn btn-warning ms-3"> Volver </a>                    
        </div>                   
    </div>
    
    
                    
    
    