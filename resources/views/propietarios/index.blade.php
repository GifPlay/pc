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
                                <h5> Propietarios </h5>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('propietarios.pdf') }}" target="_blank" class="btn btn-primary btn-block active">Exportar Clientes
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info btn-block active" href="{{ route('propietarios.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Agregar
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Correo Electrónico</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Tipo de teléfono</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($propietarios as $propietario)
                                <tr>
                                    <td>
                                        {{ $propietario->idPropietario }}
                                    </td>
                                    <td>
                                        {{ $propietario->nombre }}  {{ $propietario->apellidoPaterno }}  {{ $propietario->apellidoMaterno }}
                                    </td>
                                    <td>
                                        {{ $propietario->email }}
                                    </td>
                                    <td>
                                        {{ $propietario->telefono }}
                                    </td>
                                    <td>
                                        {{ $propietario->tipo }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Acciones">
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <a href="{{ route('propietarios.show', $propietario->idPropietario) }}"
                                                   class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('propietarios.edit', $propietario->idPropietario)}}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        form="delete_{{$propietario->idPropietario}}"
                                                        onclick="return confirm('¿Estas seguro que deseas eliminar el item?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form
                                                    action="{{route('propietarios.destroy', $propietario->idPropietario)}}"
                                                    id="delete_{{$propietario->idPropietario}}"
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
            @if($propietarios->total() > 10)
                {{$propietarios->links()}}
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#limit').on('change', function () {
            window.location.href = '{{ route( "propietarios.index" ) }}?limit=' + $(this).val() + '&search=' + $('#search').val()
        })

        $('#search').on('keyup', function (e) {
            if (e.keyCode == 13) {
                window.location.href = '{{ route("propietarios.index") }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
            }
        })
    </script>
@endsection
