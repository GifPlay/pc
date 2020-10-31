@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-10">
                                <h5> Formulario Propietario </h5>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('propietarios.index') }}" class="btn btn-primary ml-auto">
                                    <i class="fa fa-arrow-left"> Volver</i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('propietarios.store') }}" method="POST" enctype="multipart/from-data"
                              id="create">

                            <div class="row">
                                <div clas="col-12">
                                    <div class="form-group">
                                        @include('propietarios.partials.form')
                                    </div>
                                </div>
                            </div>

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
            </div>
        </div>
    </div>
@endsection()
