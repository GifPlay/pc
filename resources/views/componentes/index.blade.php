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
                                <h5> Componentes </h5>
                            </div>


                        </div>

                    </div>

                    <div class="card-body">
                        <h5> Agregar nuevo Componente </h5>
                        <form action="{{ route('componentes.store') }}" method="POST" enctype="multipart/from-data"
                              id="create">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        @include('componentes.partials.form')
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
                                <h5> Lista de componentes </h5> <br>
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
                                <th scope="col">Nombre del componente</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($componentes as $componente)
                                <tr>
                                    <td>
                                        {{ $componente->idComponente }}
                                    </td>
                                    <td>
                                        {{ $componente->nombre	}}
                                    </td>
                                    <td>
                                        ${{ $componente->precio	}} MXN
                                    </td>
                                    <td>
                                        {{ $componente->descripcion	}}
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Acciones">

                                            <a href="{{route('componentes.edit', $componente->idComponente)}}"
                                               class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    form="delete_{{$componente->idComponente}}"
                                                    onclick="return confirm('¿Estas seguro que deseas eliminar el item?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <form
                                                action="{{route('componentes.destroy', $componente->idComponente)}}"
                                                id="delete_{{$componente->idComponente}}"
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
            @if($componentes->total() > 10)
                {{$componentes->links()}}
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#limit').on('change', function () {
            window.location.href = '{{ route( "componentes.index" ) }}?limit=' + $(this).val() + '&search=' + $('#search').val()
        })

        $('#search').on('keyup', function (e) {
            if (e.keyCode == 13) {
                window.location.href = '{{ route("componentes.index") }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
            }
        })
    </script>
@endsection
