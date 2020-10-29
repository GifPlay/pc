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
                                <h5> Servicios </h5>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('servicios.create') }}" class="btn btn-info btn-block active">Agregar
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">


                        <!-- Cards -->
                        <div class="row">

                            <div class="col-md-6">
                                <a href="{{ 'home' }}">
                                    <div class="card-counter success">
                                        <i class="fas fa-business-time"></i>
                                        <span class="count-numbers">12</span>
                                        <span class="count-name">Equipos en reparación</span>

                                    </div>
                                </a>
                            </div>


                            <div class="col-md-6">
                                <a href="{{ 'home' }}">
                                    <div class="card-counter primary">
                                        <i class="fas fa-calendar-check"></i>
                                        <span class="count-numbers">599</span>
                                        <span class="count-name">Equipos para entrega</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <br>

                        <!-- Inicio de tabla -->

                        <!-- paginacion y buscar -->
                        <div class="row">
                            <div class="col-2">
                                <label>
                                    Lista:
                                </label>
                                <select class="form-control" id="limit" name="limit">
                                    @foreach ([10,20,50,100] as $limit)
                                        <option value="{{$limit}}" @if (isset($_GET['limit']))
                                            {{($_GET['limit']==$limit)?'selected':''}}
                                            @endif>{{$limit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <label>
                                        Buscar:
                                    </label>
                                    <input class="form-control" id="search" name="search" type="text"
                                           value="{{(isset($_GET['search']))?$_GET['search']:''}}">
                                </div>
                            </div>
                        </div>
                        <!-- fin paginacion y buscar-->

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Propietario</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>


                            </table>
                        </div>

                        <!-- Fin de tabla -->
                    </div>
                </div>
                <!-- end Cards -->
            </div>
        </div>

@endsection
