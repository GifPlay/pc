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
                            <h5> Servicios por Técnicos </h5>
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

    var tecnicos = {!! json_encode($tecnicos) !!};
    var nombres = {!! json_encode($nombres) !!};
    var entregados = {!! json_encode($entregados) !!};

    chart = new Highcharts.chart('grafica' ,{

        title: {
            text:'Conteo de servicios por técnico'
        },

        subtitle: {
            text: 'Gráfica'
        },

        xAxis:{
            categories: [

                @foreach($nombres as $nombre=>$tecnico)


                        '{{ $tecnico }}',

                @endforeach


            ],

        },

        yAxis:{
            title:{
                text: 'Servicios'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions:{
            series:{
                allowPointSelect: true
            }
        },

        series: [{
            type: 'column',
            name: 'Servicios asignados',
            data: tecnicos,
        },{
            type: 'column',
            name: 'Servicios Entregados',
            data: entregados,
        }


        ],

        responsive:{
            rules:[{
                condition:{
                    maxWidth: 500
                },
                chartOptions:{
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
