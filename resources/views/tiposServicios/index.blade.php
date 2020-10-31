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
                                <h5> Tipos de Servicios </h5>
                            </div>


                        </div>

                    </div>

                    <div class="card-body">
                        <h5> Agregar nuevo tipo de servicio </h5>
                        <form action="{{ route('tiposServicios.store') }}" method="POST" enctype="multipart/from-data"
                              id="create">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        @include('tiposServicios.partials.form')
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-info btn-block active" form="create">
                                        <i class="fa fa-plus"></i>
                                        Agregar
                                    </button>
                                </div>
                            </div>

                        </form>

                        <!-- Inicio de tabla -->
                        <!-- paginacion y buscar -->
                        <hr style="width:100%;">
                        <div class="row">
                            <div class="col-12">
                                <h5> Lista de tipos de servicios </h5> <br>
                            </div>

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
                                    <input class="form-control" id="search" name="search" type="text" value="{{(isset($_GET['search']))?$_GET['search']:''}}">
                                </div>
                            </div>
                        </div>
                        <!-- fin paginacion y buscar-->
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Tiempo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tipoServicios as $tipoServicio)
                                <tr>
                                    <td>
                                        {{ $tipoServicio->idTipoServicio }}
                                    </td>
                                    <td>
                                        {{ $tipoServicio->nombre }}
                                    </td>
                                    <td>
                                        ${{ $tipoServicio->precio }} MXN
                                    </td>
                                    <td>
                                        {{ $tipoServicio->tiempo }}
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Acciones">
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <a href="{{ route('tiposServicios.show', $tipoServicio->idTipoServicio) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            <a href="{{ route('tiposServicios.edit', $tipoServicio->idTipoServicio)}}"
                                               class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    form="delete_{{$tipoServicio->idTipoServicio}}"
                                                    onclick="return confirm('¿Estas seguro que deseas eliminar el item?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <form
                                                action="{{route('tiposServicios.destroy', $tipoServicio->idTipoServicio)}}"
                                                id="delete_{{$tipoServicio->idTipoServicio}}"
                                                method="post" enctype="multipart/form-data" hidden>
                                                @csrf
                                                @method('DELETE')
                                            </form>
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

        </div>
        <div class="card-footer">
            @if($tipoServicios->total() > 10)
                {{$tipoServicios->links()}}
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#limit').on('change', function () {
            window.location.href = '{{ route( "tiposServicios.index" ) }}?limit=' + $(this).val() + '&search=' + $('#search').val()
        })

        $('#search').on('keyup', function (e) {
            if (e.keyCode == 13) {
                window.location.href = '{{ route("tiposServicios.index") }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
            }
        })
    </script>
@endsection
