@extends('layouts.principal')
@section('conteudo-principal')

    <section class="section">

        @forelse($imoveis as $imovel)

            <div class="row">
                <div class="col s12 m4 l4">

                    <div class="card hoverable">
                        <div class="card large ">
                            <div class="card-image ">
                                <div class="carousel carousel-slider" data-indicators="true">

                                    @forelse($imovel->imovelFotos as $foto)

                                        <a class="carousel-item" href="{{route('imoveis.show',$imovel->id)}}">
                                            <img src="{{asset('storage/'.$foto->path_images)}}"
                                                 class="responsive-img">
                                        </a>

                                    @empty
                                    @endforelse
                                </div>
                                <span class="card-title orange-text darken-4"><strong>{{$imovel->finalidade->nome}}</strong></span>
                            </div>

                            <div class="card-content">
                                <p class="big"><strong>Valor R$:</strong>{{number_format($imovel->preco, 2, ',', '.')}}
                                </p>
                                <p class="big"><strong>Cidade: </strong>{{$imovel->cidade->nome}}</p>
                                <p class="big"><strong>Bairro: </strong> {{$imovel->endereco->bairro}}</p>
                                <p class="big"><strong>Rua: </strong> {{$imovel->endereco->rua}}</p>


                            </div>
                            <div class="card-action center">
                                <a href="{{ route('imoveis.show',$imovel->id) }}"
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
                <a class="btn-floating btn-large waves-effect waves-light" href="{{route('imoveis.create')}}">
                    <i class="large material-icons">add</i>
                </a>
            </div>


    </section>
    <script>
        $(document).ready(function () {

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true
            });
            setInterval(function () {
                $('.carousel').carousel('next');
            }, 5000);
        });
    </script>

@endsection
