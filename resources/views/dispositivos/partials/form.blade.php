@csrf
<div class="col-12">
    <label for="">Nombre del dispositivo:</label>
    <input type="text" class="form-control" name="nombreDispositivo"
           value="{{ (isset($dispositivo))?$dispositivo->nombreDispositivo:old('nombreDispositivo')}}" required>
</div>

