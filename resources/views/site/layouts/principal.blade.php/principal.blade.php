<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo.png') }}">


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
          integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>my-app-imóveis</title>
</head>

<body>
{{-- menu topo --}}

<nav>
    <div class="container">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">My Imóveis</a>
            <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('imoveis.index') }}">Imóveis</a></li>
                <li><a href="{{ route('cidades.index') }}">Cidades</a></li>
            </ul>


        </div>
    </div>
</nav>
<ul class="sidenav" id="mobile-nav">
    <li><a href="{{ route('imoveis.index') }}">Imóveis</a></li>
    <li><a href="{{ route('cidades.index') }}">Cidades</a></li>
    <li><a href="#">Service</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
</ul>


{{-- Slider --}}
@yield('slider')

{{-- Conteudo Principal --}}
<div class="container">
    @yield('conteudo-principal')
</div>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sliders = document.querySelectorAll('.slider');

        M.Slider.init(sliders, {
            indicators: false,
            height: 400,
            interval: 3000
        });
    });
</script>

</body>

</html>
