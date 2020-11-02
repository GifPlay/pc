@csrf
<div class="col-12">
    <label for="">Nombre:</label>
    <input type="text" class="form-control" name="_nombre"
           value="{{ (isset($propietario))?$propietario->nombre:old('nombre')}}" maxlength="50" required>

    <label for="">Apellido Paterno:</label>
    <input type="text" class="form-control" name="_apellidoPaterno"
           value="{{ (isset($propietario))?$propietario->apellidoPaterno:old('apellidoPaterno')}}" required>

    <label for="">Apellido Materno:</label>
    <input type="text" class="form-control" name="_apellidoMaterno"
           value="{{ (isset($propietario))?$propietario->apellidoMaterno:old('apellidoMaterno')}}"   required>

    <label for="">Correo Electrónico:</label>
    <input type="email" class="form-control" name="_email"
           value="{{ (isset($propietario))?$propietario->email:old('email')}}"   required>

    <label for="">Teléfono:</label>
    <input type="text" class="form-control" name="_telefono"
           value="{{ (isset($propietario))?$propietario->telefono:old('telefono')}}"  maxlength="10" required>

    <label for="">Tipo Teléfono:</label>
    <select class="form-control" name="_tipo" value="{{ (isset($propietario))?$propietario->tipo:old('tipo')}}" required>
        <option value="Celular">Celular</option>
        <option value="Fijo">Fijo</option>
    </select>
</div>

