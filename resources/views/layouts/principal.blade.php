<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <title>my-app-imóveis</title>
</head>
<body>
{{--menu topo--}}
<nav>
    <div class="container">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">My Imóveis</a>
            <ul class="right">
                <li><a href="#">Imóveis</a></li>
                <li><a href="#">Cidades</a></li>

            </ul>

        </div>
    </div>
</nav>

{{--conteudo principal--}}
<div class="container">
    @yield('conteudo-principal')
</div>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>
