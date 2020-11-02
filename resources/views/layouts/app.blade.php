<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> PC Container</title>



   <!-- Styles

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- cards -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">


    <main class="py-4">
        @yield('content')

    </main>


    <!-- BootStarp -->
    <script src=" {{ asset('js/shortcut.js') }}"> </script>
    <script src=" {{ asset('js/codigo.js') }}"> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!--Script para convertir a mayúsculas lo que se ingrese en minúsculas -->
    <script type="text/javascript">
        $('.mayus').on('keyup', function () {
            var value = $(this).val().toUpperCase()
            $(this).val(value)
        })
    </script>

@yield('scripts')

</body>
@include('partials.footer')

</html>
