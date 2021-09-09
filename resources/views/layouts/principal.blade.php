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
    <!-- https://material.io/resources/icons/?style=outline -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
          integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- <!-- Compiled and minified JavaScript --> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" --}}
    {{-- integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q==" --}}
    {{-- crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <style>
        p.big {
            line-height: 1.5;
            padding: 2px;
        }

        .carousel-slider {
            height: 300px !important;
        }
        .inline-icon {
            vertical-align: bottom;
            font-size: 24px !important;
            margin-left: 3vh;
        }

        /* just for jsfiddle */
        @font-face {
            font-family: "Material Icons";
            font-style: normal;
            font-weight: 400;
            src: local("Material Icons"), local("MaterialIcons-Regular"),
            url(https://fonts.gstatic.com/s/materialicons/v18/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format("woff2");
        }

        .material-icons {
            font-family: "Material Icons";
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -moz-font-feature-settings: "liga";
            -moz-osx-font-smoothing: grayscale;
        }

        .middle-indicator {
            position: absolute;
            top: 50%;
        }

        .middle-indicator-text {
            font-size: 4.2rem;
        }

        a.middle-indicator-text {
            color: white !important;
        }

        .content-indicator {
            width: 64px;
            height: 64px;
            background: none;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 50px;
        }

        .indicators {
            visibility: hidden;
        }

    </style>
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

{{-- conteudo principal --}}
<div class="container">
    @yield('conteudo-principal')
</div>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    {{-- Iniciar os script materialize --}}
    M.AutoInit();
    @if (session('sucesso'))
    M.toast({html: "{{ session('sucesso') }}"});
    @elseif(session('erro'))
    M.toast({html: "{{ session('erro') }}"});
    @endif
    {{-- Selects --}}
    document.addEventListener('DOMContentLoaded', function () {
        var select = document.querySelectorAll('select');
        var instances = M.FormSelect.init(select);
    });
    {{-- Menu Mobile --}}
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    {{-- Carrosel --}}

    {{-- textarea redimencionar auto --}}
    M.textareaAutoResize($('#descricao'));
</script>

</body>

</html>
