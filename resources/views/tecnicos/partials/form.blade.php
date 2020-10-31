@csrf
<div class="col-12">
    <label for="">Nombre:</label>
    <input type="text" class="form-control" name="_nombre"
           value="{{ (isset($tecnico))?$tecnico->nombre:old('nombre')}}" maxlength="50" required>

    <label for="">Apellido Paterno:</label>
    <input type="text" class="form-control" name="_apellidoPaterno"
           value="{{ (isset($tecnico))?$tecnico->apellidoPaterno:old('apellidoPaterno')}}" required>

    <label for="">Apellido Materno:</label>
    <input type="text" class="form-control" name="_apellidoMaterno"
           value="{{ (isset($tecnico))?$tecnico->apellidoMaterno:old('apellidoMaterno')}}"   required>

    <label for="">Correo Electrónico:</label>
    <input type="email" class="form-control" name="_email"
           value="{{ (isset($tecnico))?$tecnico->email:old('email')}}"   required>

    <label for="">Teléfono:</label>
    <input type="text" class="form-control" name="_telefono"
           value="{{ (isset($tecnico))?$tecnico->telefono:old('telefono')}}"   required>

        <label for="">Tipo Teléfono:</label>
        <select class="form-control" name="_tipo" value="{{ (isset($tecnico))?$tecnico->tipo:old('tipo')}}" required>
            <option value="Celular">Celular</option>
            <option value="Fijo">Fijo</option>
        </select>
</div>

