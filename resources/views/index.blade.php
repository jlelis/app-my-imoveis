@extends('layouts.principal')
@section('conteudo-principal')

    <section class="section">

        <ul class="collapsible">
            <li>
                <div class="collapsible-header "><i class="material-icons">search</i>Pesquisar</div>
                <div class="collapsible-body">
                    <form action="#" method="get">
                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <input type="text" name="descricao" id="descricao">
                                <label for="">Descrição</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <input type="text" name="valor_minino" id="valor_minino">
                                <label for="">Valor Minino R$:</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <input type="text" name="valor_maximo" id="valor_maximo">
                                <label for="">Valor Máximo R$: </label>
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
                                            <img src="{{url($foto->path_images)}}" class="responsive-img" style="width: 100%; height: 100%;">
                                        </a>

                                    @empty
                                    @endforelse
                                </div>
                                <span class="card-title"><strong>{{ $imovel->finalidade->nome }}</strong></span>
                            </div>

                            <div class="card-content">
                                <p class="big"><strong>Valor R$:</strong>{{ number_format($imovel->preco, 2, ',', '.') }}
                                </p>
                                <p class="big"><strong>Cidade: </strong>{{ $imovel->cidade->nome }}</p>
                                <p class="big"><strong>Bairro: </strong> {{ $imovel->endereco->bairro }}</p>
                                <p class="big"><strong>Rua: </strong> {{ $imovel->endereco->rua }}</p>


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
    <script>
        $(document).ready(function() {

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: false
            });

            // move next carousel
            $('.moveNextCarousel').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('.carousel').carousel('next');
            });

            // move prev carousel
            $('.movePrevCarousel').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('.carousel').carousel('prev');
            });


        });
        $(document).ready(function(){
            $('.collapsible').collapsible();
        });
    </script>

@endsection
