@csrf
<div class="col-12">
    <label for="">Nombre del componente:</label>
    <input type="text" class="form-control" name="nombre"
           value="{{ (isset($componente))?$componente->nombre:old('nombre')}}" maxlength="25" required>

    <label for="">Precio:</label>
    <input type="number" class="form-control" name="precio"
           value="{{ (isset($componente))?$componente->precio:old('precio')}}" required>

    <label for="">Descripción:</label>
    <input type="text" class="form-control" name="descripcion"
           value="{{ (isset($componente))?$componente->descripcion:old('descripcion')}}"  maxlength="50" required>
</div>

