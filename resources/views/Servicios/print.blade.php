<!DOCTYPE html>
<html lang="en">

<head>
    <title>Imprimir recibo</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


    <!-- Have fun using Bootstrap JS -->
    <script type="text/javascript">
        $(window).load(function () {
            $('#mostrarmodal').modal('show');
        });
    </script>


</head>
<body>

<!-- Modal -->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Cabecera de la ventana</h3>
            </div>
            <div class="modal-body">
                <h4>Texto de la ventana</h4>
                Mas texto en la ventana.
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div style="padding-top:1rem; ">

    </div>
    <div class="row">
        <div class="col-4" align="center">
            <img src="{{ asset('img/logo.png') }}" width="220">
        </div>
        <div class="col-4">
            <p><b>Email: </b>info@pccontainer.com</p>
            <p><b>Teléfono: </b>231-100-58-35</p>
            <p><b>Sitio Web: </b>www.pccontainer.com</p>
        </div>
        <div class="col-4">
            <p><b>GifPlay Company</b></p>
            <p>Dirección: Av. 2 de Abril #175</p>
            <p>Teziutlán, Puebla, México</p>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header" align="center">
            <b>Nota de recepción de equipo de computo para reparación</b>
        </div>
        <div class="card-body">
            <h6> Información del cliente</h6>
            <div class="row">
                <div class="col-4">
                    <label> <b>Nombre : </b>
                        <p>
                            {{ $servicio->propietario }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Teléfono : </b>
                        <p>
                            {{ $servicio->telefono }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Correo electrónico: </b>
                        <p>
                            {{ $servicio->correo }}
                        </p>
                    </label>
                </div>
            </div>
            <hr>

            <h6> Información del dispositivo</h6>
            <div class="row">


                <div class="col-4">
                    <label> <b>Folio: </b>
                        <p>
                            {{ $servicio->folio }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <labe><b>Fecha de ingreso: </b>
                        <p>
                            {{ $servicio->fechaRegistro }}
                        </p>
                    </labe>
                </div>
                <div class="col-4">
                    <label> <b>Dispositivo: </b>
                        <p>
                            {{ $servicio->nombreDispositivo }}
                        </p>
                    </label>
                </div>
            </div>
            <div class="row">

                <div class="col-4">
                    <label> <b>Marca y modelo: </b>
                        <p>
                            {{ $servicio->marca }} - {{ $servicio->modelo }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>color: </b>
                        <p>
                            {{ $servicio->color }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Accesorios: </b>
                        <p>
                            {{ $servicio->accesorios }}
                        </p>
                    </label>
                </div>
            </div>
            <hr>
            <h6> Información del servicio</h6>
            <div class="row">

                <div class="col-4">
                    <label> <b>Tipo de servicio: </b>
                        <p>
                            {{ $servicio->nombreServicio }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Observaciones y comentarios: </b>
                        <p>
                            {{ $servicio->observaciones }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Componentes: </b>
                        <p>
                            {{ $servicio->nombreComponente }}
                        </p>
                    </label>

                </div>
            </div>
        </div>
        <div class="card-footer" align="center">
            <label for=""> <b>Nota del cliente</b> </label>
        </div>
    </div>

    <div style="padding-top:1rem; ">

    </div>
    <div class="row">
        <div class="col-4" align="center">
            <img src="{{ asset('img/logo.png') }}" width="220">
        </div>
        <div class="col-4">
            <p><b>Email: </b>info@pccontainer.com</p>
            <p><b>Teléfono: </b>231-100-58-35</p>
            <p><b>Sitio Web: </b>www.pccontainer.com</p>
        </div>
        <div class="col-4">
            <p><b>Nombre de la empresa</b></p>
            <p>Dirección: de la empresa</p>
            <p> México</p>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header" align="center">
            <b>Nota de recepción de equipo de computo para reparación</b>
        </div>
        <div class="card-body">
            <h6> Información del cliente</h6>
            <div class="row">
                <div class="col-4">
                    <label> <b>Nombre : </b>
                        <p>
                            {{ $servicio->propietario }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Teléfono : </b>
                        <p>
                            {{ $servicio->telefono }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Correo electrónico: </b>
                        <p>
                            {{ $servicio->correo }}
                        </p>
                    </label>
                </div>
            </div>
            <hr>

            <h6> Información del dispositivo</h6>
            <div class="row">


                <div class="col-4">
                    <label> <b>Folio: </b>
                        <p>
                            {{ $servicio->folio }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <labe><b>Fecha de ingreso: </b>
                        <p>
                            {{ $servicio->fechaRegistro }}
                        </p>
                    </labe>
                </div>
                <div class="col-4">
                    <label> <b>Dispositivo: </b>
                        <p>
                            {{ $servicio->nombreDispositivo }}
                        </p>
                    </label>
                </div>
            </div>
            <div class="row">

                <div class="col-4">
                    <label> <b>Marca y modelo: </b>
                        <p>
                            {{ $servicio->marca }} - {{ $servicio->modelo }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>color: </b>
                        <p>
                            {{ $servicio->color }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Accesorios: </b>
                        <p>
                            {{ $servicio->accesorios }}
                        </p>
                    </label>
                </div>
            </div>
            <hr>
            <h6> Información del servicio</h6>
            <div class="row">

                <div class="col-4">
                    <label> <b>Tipo de servicio: </b>
                        <p>
                            {{ $servicio->nombreServicio }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Observaciones y comentarios: </b>
                        <p>
                            {{ $servicio->observaciones }}
                        </p>
                    </label>
                </div>
                <div class="col-4">
                    <label> <b>Componentes: </b>
                        <p>
                            {{ $servicio->nombreComponente }}
                        </p>
                    </label>

                </div>
            </div>
        </div>
        <div class="card-footer" align="center">
            <label for=""> <b>Nota del taller</b> </label>
        </div>
    </div>
</div>


</body>
</html>
