@extends('layouts.app')
@section('content')
    @include('partials.navbar')

    <div class="card mt-9">
        <div class="card-header d-inline-flex">
            <b>FORMULARIO SERVICIOS</b>
            <a href="{{ route('servicios.index') }}" class="btn btn-primary ml-auto">
                <i class="fa fa-arrow-left"> Volver</i></a>
        </div>
        <div class="card-body">
            <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/from-data" id="create">

                <div class="row">
                    <div clas="col-12">
                        <div class="form-group">
                @include('servicios.partials.form')

            </form>
        </div>
        <div class="card-footer">
            <div>
                <button class="btn btn-primary" form="create">
                    <i class="fa fa-plus"></i>
                    Crear
                </button>
            </div>
        </div>
    </div>
@endsection()
