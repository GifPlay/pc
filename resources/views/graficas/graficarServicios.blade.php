@extends('layouts.app')
@include('partials.navbar')
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-10">
                            <h5> Servicios por estado </h5>
                        </div>

                        <div class="col-md-2">
                            <a class="btn btn-info btn-block active" href="{{ route('home') }}">
                                <i class="fas fa-arrow-left"></i>
                                Volver
                            </a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <div id="grafica" style="width: 800px; height: 600px; margin: 0 auto">
                    </div>

                </div>
                <!-- end Cards -->
            </div>
        </div>
    </div>
</div>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">

    var servicios = {!! json_encode($servicios) !!};
    var reparacion = {!! json_encode($reparacion) !!};
    var espera = {!! json_encode($espera) !!};
    var terminado = {!! json_encode($terminado) !!};
    var entregado = {!! json_encode($entregado) !!};

    chart = new Highcharts.chart('grafica', {

        title: {
            text: 'Servicios registrados en el sistema'
        },

        subtitle: {
            text: 'Gráfica'
        },

        xAxis: {

            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
        },

        yAxis: {
            title: {
                text: 'Servicios'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },

        series: [{
            name: 'Servicios totales',
            data: servicios
        },
            {
                name: 'Servicios en reparación',
                data: reparacion
            },
            {
                name: 'Servicios en espera',
                data: espera
            },
            {
                name: 'Servicios para entrega',
                data: terminado
            },
            {
                name: 'Servicios Entregados',
                data: entregado
            }
        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>
