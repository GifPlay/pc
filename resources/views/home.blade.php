@extends('layouts.app')
@include('partials.navbar')
@section('content')

    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="color:black"><h5>Tablero</h5></div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('¡Haz iniciado sesión Correctamente!') }}
                        <br>

                        <!-- Cards -->
                        <div class="row">

                            <div class="col-md-4">
                                <a href="{{ 'servicios' }}">
                                    <div class="card-counter primary">
                                        <i class="fas fa-tools"></i>
                                        <span class="count-numbers">12</span>
                                        <span class="count-name">Servicios</span>

                                    </div>
                                </a>
                            </div>


                            <div class="col-md-4">
                                <a href="{{ 'propietarios' }}">
                                    <div class="card-counter danger">
                                        <i class="fas fa-user-tie"></i>
                                        <span class="count-numbers">599</span>
                                        <span class="count-name">Clientes</span>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ 'tecnicos' }}">
                                    <div class="card-counter success">
                                        <i class="fas fa-id-card"></i>
                                        <span class="count-numbers">6875</span>
                                        <span class="count-name">Técnicos</span>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ 'componentes' }}">
                                    <div class="card-counter naranja">
                                        <i class="fas fa-memory"></i>
                                        <span class="count-numbers">35</span>
                                        <span class="count-name">Componentes</span>
                                    </div>
                                </a>
                            </div>


                            <div class="col-md-4">
                                <a href="{{ 'home' }}">
                                    <div class="card-counter morado">
                                        <i class="fas fa-dollar-sign"></i>
                                        <span class="count-numbers">12</span>
                                        <span class="count-name">Ventas</span>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ 'home' }}">
                                    <div class="card-counter info">
                                        <i class="fas fa-clipboard-list"></i>
                                        <span class="count-numbers">12</span>
                                        <span class="count-name">Reportes</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- end Cards -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
