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
                                <h5> Técnicos </h5>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info btn-block active" href="{{ route('tecnicos.create') }}">
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
                            @foreach($tecnicos as $tecnico)
                                <tr>
                                    <td>
                                        {{ $tecnico->idTecnico }}
                                    </td>
                                    <td>
                                        {{ $tecnico->nombre }}  {{ $tecnico->apellidoPaterno }}  {{ $tecnico->apellidoMaterno }}
                                    </td>
                                    <td>
                                        {{ $tecnico->email }}
                                    </td>
                                    <td>
                                        {{ $tecnico->telefono }}
                                    </td>
                                    <td>
                                            {{ $tecnico->tipo }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Acciones">
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <a href="{{ route('tecnicos.show', $tecnico->idTecnico) }}"
                                                   class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('tecnicos.edit', $tecnico->idTecnico)}}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        form="delete_{{$tecnico->idTecnico}}"
                                                        onclick="return confirm('¿Estas seguro que deseas eliminar el item?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form
                                                    action="{{route('tecnicos.destroy', $tecnico->idTecnico)}}"
                                                    id="delete_{{$tecnico->idTecnico}}"
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
            @if($tecnicos->total() > 10)
                {{$tecnicos->links()}}
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#limit').on('change', function () {
            window.location.href = '{{ route( "tecnicos.index" ) }}?limit=' + $(this).val() + '&search=' + $('#search').val()
        })

        $('#search').on('keyup', function (e) {
            if (e.keyCode == 13) {
                window.location.href = '{{ route("tecnicos.index") }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
            }
        })
    </script>
@endsection
