@csrf

<div class="col-12">
    <label for="">Razón Social:</label>
    <input type="text" class="form-control" name="_razon_social"
           value="{{ (isset($proveedor))?$proveedor->razon_social:old('razon_social')}}" required>
</div>
<div class="col-12">
    <label for="">Nombre:</label>
    <input type="text" class="form-control" name="_nombre_completo"
           value="{{ (isset($proveedor))?$proveedor->nombre_completo:old('nombre_completo')}}" required>
</div>
<div class="col-12">
    <label for="">Teléfono:</label>
    <input type="tel" class="form-control" name="_telefono"
           value="{{ (isset($proveedor))?$proveedor->telefono:old('telefono')}}" required>
</div>
<div class="col-12">
    <label for="">Tipo Teléfono:</label>
    <select class="form-control" name="_tipo" value="{{ (isset($proveedor))?$proveedor->tipo:old('tipo')}}" required>
        <option value="Celular">Celular</option>
        <option value="Fijo">Fijo</option>
    </select>
</div>
<div class="col-12">
    <label for="">RFC:</label>
    <input type="text" class="form-control" name="_rfc" value="{{ (isset($proveedor))?$proveedor->rfc:old('rfc')}}"
           minlength="13" maxlength="13" required>
</div>
<div class="col-12">
    <label for="">Correo Electrónico:</label>
    <input type="email" class="form-control" name="_email"
           value="{{ (isset($proveedor))?$proveedor->correo_electronico:old('correo_electronico')}}" required>
</div>
<div class="col-12">
    <label for="">Calle:</label>
    <input type="text" class="form-control" name="_calle"
           value="{{ (isset($proveedor))?$proveedor->calle:old('calle')}}" required>
</div>
<div class="col-12">
    <label for="">Número de casa:</label>
    <input type="text" class="form-control" name="_numero"
           value="{{ (isset($proveedor))?$proveedor->numero:old('numero')}}" required>
</div>
<div class="col-12">
    <label for="">Colonia:</label>
    <select class="form-control" name="_id_colonia">
        @foreach($colonias as $colonia)
            <option value="{{ $colonia->id_colonia }}" required>
                {{ $colonia->nombre }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-12">
    <label for="">Municipio:</label>
    <input type="text" class="form-control" name="_municipio"
           value="{{ (isset($proveedor))?$proveedor->municipio:old('municipio')}}" required>
</div>

</div>
<div>
