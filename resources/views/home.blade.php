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
                                        @foreach($servicios as $servicio)
                                        <span class="count-numbers">{{ $servicio }}</span>
                                        <span class="count-name">Servicios</span>
                                        @endforeach

                                    </div>
                                </a>
                            </div>


                            <div class="col-md-4">
                                <a href="{{ 'propietarios' }}">
                                    <div class="card-counter danger">
                                        <i class="fas fa-user-tie"></i>
                                        @foreach($propietarios as $propietario)
                                        <span class="count-numbers">{{ $propietario }}</span>
                                        <span class="count-name">Clientes</span>
                                        @endforeach
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ 'tecnicos' }}">
                                    <div class="card-counter success">
                                        <i class="fas fa-id-card"></i>
                                        @foreach($tecnicos as $tecnico)
                                            <span class="count-numbers">{{ $tecnico }}</span>
                                        <span class="count-name">Técnicos</span>
                                        @endforeach
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ 'componentes' }}">
                                    <div class="card-counter naranja">
                                        <i class="fas fa-memory"></i>
                                        @foreach($componentes as $componente)
                                            <span class="count-numbers">{{ $componente }}</span>
                                        <span class="count-name">Componentes</span>
                                        @endforeach
                                    </div>
                                </a>
                            </div>


                            <div class="col-md-4">
                                <a href="{{ 'ventas' }}">
                                    <div class="card-counter morado">
                                        <i class="fas fa-dollar-sign"></i>
                                        @foreach($ventas as $venta)
                                            <span class="count-numbers">{{ $venta }}</span>
                                        <span class="count-name">Ventas</span>
                                        @endforeach
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ 'reportes' }}">
                                    <div class="card-counter info">
                                        <i class="fas fa-clipboard-list"></i>
                                        <span class="count-name">Reportes</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- end Cards -->
                            <br>
                            <h2>Gráficas</h2>
                            <br>
                        <!-- graficas -->
                            <div class="row">
                                <div class="col-6">

                                        <a href="{{ route('servicios.grafica') }}" class="btn btn-info btn-block active">Visualizar gráfica de servicios
                                            <i class="fas fa-chart-line"></i>
                                        </a>


                                </div>
                                <div class="col-6">

                                    <a href="{{ route('tecnicos.grafica') }}" class="btn btn-info btn-block active">Visualizar gráfica de servicios por técnico
                                        <i class="fas fa-chart-line"></i>
                                    </a>


                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
