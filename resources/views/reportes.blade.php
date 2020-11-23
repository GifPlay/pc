@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Reportes</h5>

                    </div>

                    <div class="card-body">


                        <!-- Cards -->
                        <div class="row">

                            <div class="col-md-12">
                                <a href="{{ route('propietarios.pdf') }}" target="_blank">
                                <div class="card-counter es1">
                                    <i class="fas fa-user"></i>
                                    @foreach($propietarios as $propietario)
                                        <span class="count-numbers">{{ $propietario }}</span>
                                    @endforeach
                                    <span class="count-name">Clientes</span>

                                </div>
                                </a>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('servicios.pdf') }}" target="_blank">
                                <div class="card-counter es2">
                                    <i class="fas fa-tools"></i>
                                    @foreach($servicios as $servicio)
                                        <span class="count-numbers">{{ $servicio }}</span>
                                    @endforeach
                                    <span class="count-name">Servicios</span>
                                </div>
                                </a>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('ventas.pdf') }}" target="_blank">
                                <div class="card-counter es3">
                                    <i class="fas fa-dollar-sign"></i>
                                    @foreach($ventas as $venta)
                                        <span class="count-numbers">{{ $venta }}</span>
                                    @endforeach
                                    <span class="count-name">Ventas</span>
                                </div>
                                </a>
                            </div>


                        </div>
                        <br>


                    </div>
                </div>
                <!-- end Cards -->
                <div class="card-footer">

                </div>
            </div>

        </div>
    </div>

@endsection

