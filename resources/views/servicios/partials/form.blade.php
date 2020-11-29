@csrf
<div class="row">
    <div class="col-4">
        <label for="">Marca:</label>
        <input type="text" class="form-control" name="_marca" required>
    </div>
    <div class="col-4">
        <label for="">Modelo:</label>
        <input type="text" class="form-control" name="_modelo" required>
    </div>
    <div class="col-4">
        <label for="">Fecha de registro:</label>
        <input type="text" class="form-control" name="_fechaRegistro" value="{{  date("Y-m-d") }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <label for="">Observaciones del equipo:</label>
        <textarea type="text" class="form-control" name="_observaciones" required>
        </textarea>
    </div>
    <div class="col-6">
        <label for="">Color:</label>
        <input type="text" class="form-control" name="_color" required>
    </div>

    <div class="col-12">
        <label for="">Accesorios:</label>
        <input type="text" class="form-control" name="_accesorios" required>
    </div>

</div>


<div class="row">
    <div class="col-2">
        <label for="">Estado:</label>
        <select class="form-control" name="_estado">

            <option value="En reparacion" required>
                En reparación
            </option>
            <option value="En reparacion" required>
                En espera
            </option>
            <option value="En reparacion" required>
                Para entrega
            </option>
            <option value="En reparacion" required>
                Entregado
            </option>
        </select>
    </div>

    <div class="col-5">
        <label for="">Componente:</label>
        <select class="form-control" name="_idComponente">

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
        <input type="text" class="form-control" name="_folio"  value="{{ date('dmy-His')  }}" readonly>
    </div>

    <div class="col-6">
        <label for="">Forma de pago:</label>
        <select class="form-control" name="_formaPago">

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




