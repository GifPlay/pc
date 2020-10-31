@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-10">
                                <h5>Detalles del técnico </h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('tecnicos.index') }}" class="btn btn-primary ml-auto">
                                    <i class="fa fa-arrow-left"> Volver</i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <p><b>ID:</b> {{ $tecnico->idTecnico }}</p>
                        <p><b>Nombre Completo: </b>{{ $tecnico->nombre }} {{ $tecnico->apellidoPaterno }} {{ $tecnico->apellidoMaterno }}</p>
                        <p><b>Correo Electrónico: </b>{{ $tecnico->email }}</p>
                        <p><b>Teléfono: </b>{{ $tecnico->telefono }}</p>
                        <p><b>Tipo de teléfono: </b> {{ $tecnico->tipo}}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('tecnicos.edit', $tecnico->idTecnico) }}">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
