<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exportar</title>
    <style type="text/css">
        body {
            font-family: 'Helvetica';
            font-size: 10px;
        }
        .container {
            width: 100%;
            max-width: 1024px;
        }
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .card_indicator {
            position: relative;
        }
        .indicator {
            display: block;
            font-size: 4rem;
            font-weight: 700;
            color: #2f2f2f;
        }
        .legend {
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: .05rem;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            padding: 4px;
        }
        .table {
            margin-bottom: 2rem;
        }
        .table tr {
            border-bottom: 1px solid rgba(0,0,0,.225);
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border-collapse: collapse;
            border: 1px solid black !important;
        }
        .mb-4, .my-4 {
            margin-bottom: 1.5rem!important;
        }
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
            padding: 1rem;
        }
        .card .card-header {
            background: #fff;
            padding: 0 0 .5rem 0;
        }
        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }
        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            color: inherit;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        small, small {
            font-size: 80%;
            font-weight: 400;
        }
        .text-center {
            text-align: center !important;
        }
    </style>
</head>
<body>
<!-- DIV para boton exportar-->
<div class="card-header d-inline-flex">
    <b> REPORTE DE VENTAS</b>
</div>
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
</body>
</html>
