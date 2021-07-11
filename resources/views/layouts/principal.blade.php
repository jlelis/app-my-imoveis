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

    {{--    <!-- Compiled and minified JavaScript -->--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"--}}
    {{--            integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q=="--}}
    {{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

    <style>
        p.big {
            line-height: 1.5;
        }
        .carousel-slider {
            height: 400px !important;
        }
    </style>
    <title>my-app-imóveis</title>
</head>
<body>
{{--menu topo--}}

<nav>
    <div class="container">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">My Imóveis</a>
            <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('imoveis.index')}}">Imóveis</a></li>
                <li><a href="{{route('cidades.index')}}">Cidades</a></li>
            </ul>


        </div>
    </div>
</nav>
<ul class="sidenav" id="mobile-nav">
    <li><a href="{{route('imoveis.index')}}">Imóveis</a></li>
    <li><a href="{{route('cidades.index')}}">Cidades</a></li>
    <li><a href="#">Service</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
</ul>

{{--conteudo principal--}}
<div class="container">
    @yield('conteudo-principal')
</div>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    {{-- Iniciar os script materialize --}}
    M.AutoInit();
    @if(session('sucesso'))
    M.toast({html: "{{session('sucesso')}}"});
    @elseif(session('erro'))
    M.toast({html: "{{session('erro')}}"});
    @endif
    {{-- Selects --}}
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
    {{-- Menu Mobile --}}
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    {{-- Carrosel--}}

    {{-- textarea redimencionar auto--}}
    M.textareaAutoResize($('#descricao'));



</script>

</body>
</html>
