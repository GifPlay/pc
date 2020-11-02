@csrf
<div class="row">
    <div class="col-4">
            <label for="">Nombre:</label>
            <input type="text" class="form-control" name="_nombre"
                   value="{{ (isset($tecnico))?$tecnico->nombre:old('nombre')}}" maxlength="50" required>
    </div>
    <div class="col-4">
        <label for="">Apellido Paterno:</label>
        <input type="text" class="form-control" name="_apellidoPaterno"
               value="{{ (isset($tecnico))?$tecnico->apellidoPaterno:old('apellidoPaterno')}}" required>
    </div>
    <div class="col-4">
        <label for="">Apellido Materno:</label>
        <input type="text" class="form-control" name="_apellidoMaterno"
               value="{{ (isset($tecnico))?$tecnico->apellidoMaterno:old('apellidoMaterno')}}"   required>
    </div>
    <br>
    <div class="col-6">
        <label for="">Correo Electrónico:</label>
        <input type="email" class="form-control" name="_email"
               value="{{ (isset($tecnico))?$tecnico->email:old('email')}}"   required>
    </div>
    <div class="col-3">
        <label for="">Teléfono:</label>
        <input type="text" class="form-control" name="_telefono"
               value="{{ (isset($tecnico))?$tecnico->telefono:old('telefono')}}"   required>
    </div>
    <div class="col-3">
        <label for="">Tipo Teléfono:</label>
        <select class="form-control" name="_tipo" value="{{ (isset($tecnico))?$tecnico->tipo:old('tipo')}}" required>
            <option value="Celular">Celular</option>
            <option value="Fijo">Fijo</option>
        </select>
    </div>

</div>

