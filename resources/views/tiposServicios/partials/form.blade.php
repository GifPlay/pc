@csrf
<div class="col-12">
    <label for="">Nombre del tipo de servicio:</label>
    <input type="text" class="form-control" name="nombre"
           value="{{ (isset($tipoServicio))?$tipoServicio->nombre:old('nombre')}}" maxlength="50" required>

    <label for="">Precio:</label>
    <input type="number" class="form-control" name="precio"
           value="{{ (isset($tipoServicio))?$tipoServicio->precio:old('precio')}}" required>

    <label for="">Tiempo:</label>
    <input type="text" class="form-control" name="tiempo" placeholder="HH:MM"
           value="{{ (isset($tipoServicio))?$tipoServicio->tiempo:old('tiempo')}}"   required>
</div>

