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
                            <div class="col-md-9">
                                <h5> Ventas </h5>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('ventas.pdf') }}" target="_blank" class="btn btn-primary btn-block active">Exportar Ventas
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

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
                                    <th scope="col-1">Pieza</th>
                                    <th scope="col-1">Precio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ventas as $venta)
                                    <tr>
                                        <td>
                                            {{ $venta->idServicio }}
                                        </td>
                                        <td>
                                            {{ $venta->folio }}
                                        </td>
                                        <td>
                                            {{ $venta->propietario }}
                                        </td>
                                        <td>
                                            {{ $venta->nombreDispositivo }}, {{ $venta->color }}
                                            , {{ $venta->marca }} - {{ $venta->modelo }}
                                        </td>

                                        <td>
                                            {{ $venta->fechaRegistro }}
                                        </td>
                                        <td>
                                            {{ $venta->nombreServicio }}
                                        </td>
                                        <td>
                                            {{ $venta->estado }}
                                        </td>
                                        <td>
                                            {{ $venta->nombreComponente }}
                                        </td>
                                        <td>
                                            ${{ $venta->precio }}
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
                    @if($ventas->total() > 10)
                        {{$ventas->links()}}
                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#limit').on('change', function () {
            window.location.href = '{{ route( "ventas.index" ) }}?limit=' + $(this).val() + '&search=' + $('#search').val()
        })

        $('#search').on('keyup', function (e) {
            if (e.keyCode == 13) {
                window.location.href = '{{ route("ventas.index") }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
            }
        })
    </script>

@endsection

