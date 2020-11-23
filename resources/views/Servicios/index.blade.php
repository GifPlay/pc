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
                            <div class="col-md-7">
                                <h5> Servicios </h5>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('servicios.pdf') }}" target="_blank" class="btn btn-primary btn-block active">Exportar Servicios
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('servicios.create') }}" class="btn btn-success btn-block active">Agregar
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>

                        </div>

                    </div>

                    <div class="card-body">


                        <!-- Cards -->
                        <div class="row">

                            <div class="col-md-3">

                                <div class="card-counter es1">
                                    <i class="fas fa-hourglass-start"></i>
                                    @foreach($reparaciones as $reparacion)
                                        <span class="count-numbers">{{ $reparacion }}</span>
                                    @endforeach
                                    <span class="count-name">En reparación</span>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card-counter es2">
                                    <i class="fas fa-hourglass-half"></i>
                                    @foreach($esperas as $espera)
                                        <span class="count-numbers">{{ $espera }}</span>
                                    @endforeach
                                    <span class="count-name">En espera</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card-counter es3">
                                    <i class="fas fa-hourglass-end"></i>
                                    @foreach($entregas as $entrega)
                                        <span class="count-numbers">{{ $entrega }}</span>
                                    @endforeach
                                    <span class="count-name">Para entrega</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card-counter morado">
                                    <i class="far fa-hourglass"></i>
                                    @foreach($entregados as $entregado)
                                        <span class="count-numbers">{{ $entregado }}</span>
                                    @endforeach
                                    <span class="count-name">Entregados</span>
                                </div>
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
                                    <th scope="col">Folio</th>
                                    <th scope="col">Propietario</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Ingresó</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col-1">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($servicios as $servicio)
                                    <tr>
                                        <td>
                                            {{ $servicio->idServicio }}
                                        </td>
                                        <td>
                                            {{ $servicio->folio }}
                                        </td>
                                        <td>
                                            {{ $servicio->propietario }}
                                        </td>
                                        <td>
                                            {{ $servicio->nombreDispositivo }}, {{ $servicio->color }}
                                            , {{ $servicio->marca }} - {{ $servicio->modelo }}
                                        </td>

                                        <td>
                                            {{ $servicio->fechaRegistro }}
                                        </td>
                                        <td>
                                            {{ $servicio->nombreServicio }}
                                        </td>
                                        <td>
                                            {{ $servicio->estado }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <div class="btn-group" role="group" aria-label="Acciones">
                                                    <a href="{{ route('servicios.show', $servicio->idServicio) }}"
                                                       class="btn btn-warning btn-sm" target="_blank">
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('servicios.edit', $servicio->idServicio)}}"
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Fin de tabla -->
                    </div>
                </div>
                <!-- end Cards -->
                <div class="card-footer">
                    @if($servicios->total() > 10)
                        {{$servicios->links()}}
                    @endif
                </div>
            </div>

        </div>
        </div>

        @endsection

        @section('scripts')
            <script type="text/javascript">
                $('#limit').on('change', function () {
                    window.location.href = '{{ route( "servicios.index" ) }}?limit=' + $(this).val() + '&search=' + $('#search').val()
                })

                $('#search').on('keyup', function (e) {
                    if (e.keyCode == 13) {
                        window.location.href = '{{ route("servicios.index") }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
                    }
                })
            </script>

@endsection

