@extends('layouts.app')
@include('partials.navbar')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-inline-flex">
                        <b>Editar Componente</b>
                        <a href="{{ route('componentes.index') }}" class="btn btn-primary ml-auto">
                            <i class="fa fa-arrow-left"> Volver</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('componentes.update', $componente->idComponente) }}" method="POST"
                              enctype="multipart/from-data" id="create">
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <label> ID del Componente:</label>
                                    <input type="text" class="form-control" name="idDispositivo"
                                           value="{{ (isset($componente))?$componente->idComponente:old('idComponente')}}"
                                           readonly>
                                </div>
                                @include('componentes.partials.form')
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" form="create">
                            <i class="fa fa-save"></i>
                            Guardar cambios
                        </button>
                        <button class="btn btn-danger" form="delete_{{ $componente->idComponente }}"
                                onclick="return confirm('¿Está usted seguro de eliminar el registro?')">
                            <i class="fa fa-trash"></i>
                            Eliminar
                        </button>
                        <form action="{{ route('dispositivos.destroy', $componente->idComponente) }}"
                              id="delete_{{ $componente->idComponente }}" method="post"
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
