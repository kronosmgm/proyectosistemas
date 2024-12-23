<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $producto?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $producto?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Stock') }}</label>
            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $producto?->stock) }}" id="stock" placeholder="Stock">
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="foto" class="form-label">{{ __('Foto') }}</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto', $producto?->foto) }}" id="foto" placeholder="Foto">
            {!! $errors->first('foto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>



        <div class="form-group mb-2 mb20">
            <label for="clasificacion_id" class="form-label">{{ __('Clasificacion Id') }}</label>

            
            <select name="clasificacion_id" class="form-control @error('clasificacion_id') is-invalid @enderror" value="{{ old('clasificacion_id', $producto?->clasificacion_id) }}" id="clasificacion_id" >
                 <option value="">--seleccione una clasificacion--</option>
            @foreach($clas as $clasi)
                <option value="{{$clasi->id}}">{{$clasi->descripcion}}</option>
            @endforeach
            </select>

        </div>

       
        <div class="form-group mb-2 mb20">
            <label for="marca_id" class="form-label">{{ __('Marca Id') }}</label>

            <select name="marca_id" class="form-control @error('marca_id') is-invalid @enderror" value="{{ old('marca_id', $producto?->marca_id) }}" id="marca_id" >
                 <option value="">--seleccione una marca--</option>
            @foreach($marc as $mar)
                <option value="{{$mar->id}}">{{$mar->nombre}}</option>
            @endforeach
            </select>


        </div>

        <div class="form-group mb-2 mb20">
            <label for="procedencia_id" class="form-label">{{ __('Procedencia Id') }}</label>
            <select name="procedencia_id" class="form-control @error('procedencia_id') is-invalid @enderror"  id="procedencia_id" >
                 <option value="">--seleccione un pais--</option>
            @foreach($var as $vari)
                <option value="{{$vari->id}}">{{$vari->nombre}}</option>
            @endforeach
            </select>
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>