@csrf

<div class="row">
    <div class="col-4">
        <label for="">Marca:</label>
        <input type="text" class="form-control" name="_marca"
               value="{{ (isset($servicio))?$servicio->marca:old('marca')}}" required>
    </div>
    <div class="col-4">
        <label for="">Modelo:</label>
        <input type="text" class="form-control" name="_modelo"
               value="{{ (isset($servicio))?$servicio->modelo:old('modelo')}}" required>
    </div>
    <div class="col-4">
        <label for="">Fecha de registro:</label>
        <input type="date" class="form-control" name="_fechaRegistro"
               value="{{ (isset($servicio))?$servicio->fechaRegistro:old('fechaRegistro')}}" readonly>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <label for="">Observaciones del equipo:</label>
        <textarea type="text" class="form-control" name="_observaciones" required>
            {{ (isset($servicio))?$servicio->observaciones:old('observaciones')}}
        </textarea>
    </div>
    <div class="col-6">
        <label for="">Color:</label>
        <input type="text" class="form-control" name="_color"
               value="{{ (isset($servicio))?$servicio->color:old('color')}}" required>
    </div>

    <div class="col-12">
        <label for="">Accesorios:</label>
        <input type="text" class="form-control" name="_accesorios"
               value="{{ (isset($servicio))?$servicio->accesorios:old('accesorios')}}"required>
    </div>

</div>


<div class="row">
    <div class="col-2">
        <label for="">Estado:</label>
        <select class="form-control" name="_estado">
            <option value="{{ (isset($valores))?$valores->estado:old('estado')}}">
                {{ $servicio->estado }}
            </option>
            <option value="En reparacion" >
                En reparación
            </option>
            <option value="En espera" >
                En espera
            </option>
            <option value="Para Entregar" >
                Para entrega
            </option>
            <option value="Entregado" >
                Entregado
            </option>
        </select>
    </div>

    <div class="col-5">
        <label for="">Componente:</label>
        <select class="form-control" name="_idComponente">
            <option value="{{ (isset($valores))?$valores->idComponente:old('idComponente')}}">
                {{ $servicio->nombreComponente }}
            </option>
            @foreach($componentes as $componente)
                <option value="{{ $componente->idComponente }}" required>
                    {{ $componente->idComponente }}. {{ $componente->nombre }} - ${{ $componente->precio }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-5">
        <label for="">Tipo de servicio:</label>
        <select class="form-control" name="_idTipoServicio">
            <option value="{{ (isset($valores))?$valores->idTipoServicio:old('idTipoServicio')}}">
                {{ $servicio->nombreServicio }}
            </option>

            @foreach($tipoServicios as $tipoServicio)
                <option value="{{ $tipoServicio->idTipoServicio }}" required>
                    {{ $tipoServicio->nombre}} - ${{ $tipoServicio->precio}} - {{ $tipoServicio->tiempo}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <label for="">Técnico:</label>
        <select class="form-control" name="_idTecnico">
            <option value="{{ (isset($valores))?$valores->idTecnico:old('idTecnico')}}">
                {{ $servicio->tecnico }}
            </option>

            @foreach($tecnicos as $tecnico)
                <option value="{{ $tecnico->idTecnico }}" required>
                    {{ $tecnico->nombre }} {{ $tecnico->apellidoPaterno }} {{ $tecnico->apellidoMaterno }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-4">
        <label for="">Propietario:</label>
        <select class="form-control" name="_idPropietario">
            <option value="{{ (isset($valores))?$valores->idPropietario:old('idPropietario')}}">
                {{ $servicio->propietario }}
            </option>

            @foreach($propietarios as $propietario)
                <option value="{{ $propietario->idPropietario }}" required>
                    {{ $propietario->nombre }} {{ $propietario->apellidoPaterno }} {{ $propietario->apellidoMaterno }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-4">
        <label for="">Dispositivo:</label>
        <select class="form-control" name="_idDispositivo">
            <option value="{{ (isset($valores))?$valores->idDispositivo:old('idDispositivo')}}">
                {{ $servicio->nombreDispositivo }}
            </option>
            @foreach($dispositivos as $dispositivo)
                <option value="{{ $dispositivo->idDispositivo }}" required>
                    {{ $dispositivo->nombreDispositivo }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <label for="">Folio:</label>
        <input type="text" class="form-control" name="_folio"
               value="{{ (isset($servicio))?$servicio->folio:old('folio')}}" readonly>
    </div>

    <div class="col-6">
        <label for="">Forma de pago:</label>
        <select class="form-control" name="_formaPago">
            <option value="{{ (isset($valores))?$valores->formaPago:old('formaPago')}}">
                {{ $servicio->formaPago }}
            </option>

            <option value="Efectivo" required>
                Efectivo
            </option>
            <option value="Transferencia" required>
                Transferencia
            </option>
            <option value="Tarjeta de credito" required>
                Tarjeta de crédito
            </option>
            <option value="Tarjeta de debito" required>
                Tarjeta de debito
            </option>
        </select>
    </div>
</div>


