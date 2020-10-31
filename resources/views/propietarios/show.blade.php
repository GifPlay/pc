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
                                <h5>Detalles del propietario </h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('propietarios.index') }}" class="btn btn-primary ml-auto">
                                    <i class="fa fa-arrow-left"> Volver</i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <p><b>ID:</b> {{ $propietario->idPropietario }}</p>
                        <p><b>Nombre Completo: </b>{{ $propietario->nombre }} {{ $propietario->apellidoPaterno }} {{ $propietario->apellidoMaterno }}</p>
                        <p><b>Correo Electrónico: </b>{{ $propietario->email }}</p>
                        <p><b>Teléfono: </b>{{ $propietario->telefono }}</p>
                        <p><b>Tipo de teléfono: </b> {{ $propietario->tipo}}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('propietarios.edit', $propietario->idPropietario) }}">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
