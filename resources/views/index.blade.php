@extends('layouts.principal')
@section('conteudo-principal')

    <section class="section">

        {{--Barra de pesquisa--}}
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header "><i class="material-icons">search</i>Pesquisar</div>
                <div class="collapsible-body">
                    <form action="{{ route('imoveis.index') }}" method="GET" id="form_id">

                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <input type="text" name="descricao" id="descricao">
                                <label for="">Descrição</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <input type="text" name="valor_minino" id="valor_minino">
                                <label for="">Valor Mínino R$:</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <input type="text" name="valor_maximo" id="valor_maximo">
                                <label for="">Valor Máximo R$: </label>
                            </div>
                            <div>
                                <input type="reset" class="btn-flat waves-effect  white-text green"/>

                                <input type="submit" class="btn-flat waves-effect white-text blue" onclick="getClick();"
                                       value="Pesquisar"/>

                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>


        <div class="row">
            @forelse($imoveis as $imovel)
                <div class="col s12 m4 l4">
                    <!--Card Inicial -->
                    <div class="card hoverable">
                        <div class="card large">
                            <div class="card-image ">
                                <div class="carousel carousel-slider" data-indicators="true">
                                    <div class="carousel-fixed-item center middle-indicator">
                                        <div class="left">
                                            <a href="Previo"
                                               class="movePrevCarousel middle-indicator-text waves-effect waves-light content-indicator"><i
                                                    class="material-icons left  middle-indicator-text">chevron_left</i></a>
                                        </div>

                                        <div class="right">
                                            <a href="Siguiente"
                                               class=" moveNextCarousel middle-indicator-text waves-effect waves-light content-indicator"><i
                                                    class="material-icons right middle-indicator-text">chevron_right</i></a>
                                        </div>
                                    </div>
                                    @forelse($imovel->imovelFotos as $foto)

                                        <a class="carousel-item" href="{{ route('imoveis.show', $imovel->id) }}">
                                            <img src="{{url($foto->path_images)}}" class="responsive-img"
                                                 style="width: 100%; height: 100%;">
                                        </a>

                                    @empty
                                    @endforelse
                                </div>
                                <span class="card-title"><strong>{{ $imovel->finalidade->nome }}</strong></span>
                            </div>

                            <div class="card-content">


                                <p class="center-align"><strong>{{ $imovel->cidade->nome }}</strong></p>


                                {{--                                <p class="big"><strong>Bairro: </strong> {{ $imovel->endereco->bairro }}</p>--}}
                                {{--                                <p class="big"><strong>Rua: </strong> {{ $imovel->endereco->rua }}</p>--}}
                                {{--                                    <i class="material-icons-outlined">--}}
                                {{--bed--}}
                                {{--</i>--}}


                                <div class="row">
                                    <div class="col s6">
                                        <p class="big"><span class="inline-icon material-icons-outlined">hotel</span>
                                            {{$imovel->dormitorios}}
                                        </p>
                                        <p class="big">
                                            <span
                                                class="inline-icon material-icons-outlined">directions_car_filled</span>
                                            {{$imovel->garagens}}
                                        </p>
                                    </div>


                                    <div class="col s6">
                                        <p class="big">
                                        <span
                                            class="inline-icon material-icons-outlined">bathtub</span>
                                            {{$imovel->banheiros}}
                                        </p>

                                        <p class="big">
                                            <span class="inline-icon material-icons-outlined">straighten</span>
                                            {{$imovel->terreno}} m²
                                        </p>

                                    </div>
                                    <div class="col s12 ">
                                        <p class="center-align"><strong>Total
                                                R$: </strong>{{ number_format($imovel->preco, 2, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action center">
                                <a href="{{ route('imoveis.show', $imovel->id) }}"
                                   class="waves-effect waves-light btn-small">Mais Detalhes</a>
                            </div>

                        </div>

                    </div>
                    <br>

                </div>
            @empty

            @endforelse
        </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('imoveis.create') }}">
                <i class="large material-icons">add</i>
            </a>
        </div>


    </section>
    {{--Paginação --}}
    <ul class="pagination center">
        {{-- Previous Page Link --}}
        @if ($imoveis->onFirstPage())
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        @else
            <li class="waves-effect"><a href="{{ $imoveis->previousPageUrl() }}"><i
                        class="material-icons">chevron_left</i></a></li>
        @endif

        {{-- Page Number Links --}}
        @for($i=1; $i<=$imoveis->lastPage(); $i++)
            @if($i==$imoveis->currentPage())
                <li class="active"><a href="?page={{$i}}">{{$i}}</a></li>
            @else
                <li class="waves-effect"><a href="?page={{$i}}">{{$i}}</a></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($imoveis->hasMorePages())
            <li class="waves-effect"><a href="{{ $imoveis->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a>
            </li>
        @else
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
    {{--Scripts utilizado nessa tela--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: false
            });

            // move next carousel
            $('.moveNextCarousel').click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                $('.carousel').carousel('next');
            });

            // move prev carousel
            $('.movePrevCarousel').click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                $('.carousel').carousel('prev');
            });


        });
        $(document).ready(function () {
            $('.collapsible').collapsible();
        });
    </script>
    <script>
        function stopDefAction(evt) {
            evt.preventDefault();
        }
        document.getElementById('form_id').addEventListener(
            'click', topDefAction, false);
    </script>

@endsection
