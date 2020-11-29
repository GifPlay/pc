@extends('layouts.app')
@include('partials.navbar')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-inline-flex">
                        <b>Editar Dispositivo</b>
                        <a href="{{ route('dispositivos.index') }}" class="btn btn-primary ml-auto">
                            <i class="fa fa-arrow-left"> Volver</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dispositivos.update', $dispositivo->idDispositivo) }}" method="POST"
                              enctype="multipart/from-data" id="create">
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <label> ID del dispositivo:</label>
                                <input type="text" class="form-control" name="idDispositivo"
                                       value="{{ (isset($dispositivo))?$dispositivo->idDispositivo:old('idDispositivo')}}"
                                       readonly>
                                </div>
                                @include('dispositivos.partials.form')
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" form="create">
                            <i class="fa fa-save"></i>
                            Guardar cambios
                        </button>
                        <button class="btn btn-danger" form="delete_{{ $dispositivo->idDispositivo }}"
                                onclick="return confirm('¿Está usted seguro de eliminar el registro?')">
                            <i class="fa fa-trash"></i>
                            Eliminar
                        </button>
                        <form action="{{ route('dispositivos.destroy', $dispositivo->idDispositivo) }}"
                              id="delete_{{ $dispositivo->idDispositivo    }}" method="post"
                              enctype="multipart/from-data" hidden>
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
