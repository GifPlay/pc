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
                                <h5>Detalles del tipo de servicio </h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('tiposServicios.index') }}" class="btn btn-primary ml-auto">
                                    <i class="fa fa-arrow-left"> Volver</i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <p><b>ID:</b> {{ $tipoServicio->idTipoServicio }}</p>
                        <p><b>Nombre: </b>{{ $tipoServicio->nombre }} </p>
                        <p><b>Precio: </b>{{ $tipoServicio->precio }}</p>
                        <p><b>Tiempo: </b> {{ $tipoServicio->tiempo}}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('tiposServicios.edit', $tipoServicio->idTipoServicio) }}">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
