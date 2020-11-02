@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-10">
                                <h5>Detalles del servicoi </h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('servicios.index') }}" class="btn btn-primary ml-auto">
                                    <i class="fa fa-arrow-left"> Volver</i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <p><b>ID:</b> {{ $servicio->idServicio }}</p>
                        <p><b>Folio: </b>{{ $servicio->folio }}</p>
                        <p><b>Forma de pago: </b>{{ $servicio->formaPAgo }}</p>
                        <p><b>Estado: </b>{{ $servicio->estado }}</p>
                        <p><b>Nombre del Cliente: </b>{{ $servicio->propietario }} </p>
                        <p><b>Equipo: </b>{{ $servicio->nombreDispositivo }} {{ $servicio->color }}, {{ $servicio->marca }}-{{ $servicio->modelo }}</p>
                        <p><b>observaciones: </b>{{ $servicio->observaciones }}</p>
                        <p><b>Fecha de registro: </b>{{ $servicio->fechaRegistro }}</p>
                        <p><b>Accesorios: </b>{{ $servicio->accesorios }}</p>
                        <p><b>Componentes requeridos: </b>{{ $servicio->nombreComponente }}</p>
                        <p><b>Técnico encargado: </b>{{ $servicio->tecnico }}</p>
                        <p><b>Servicio realizado: </b> {{ $servicio->nombreServicio}}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('servicios.edit', $servicio->idServicio) }}">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
