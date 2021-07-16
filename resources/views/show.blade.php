@extends('layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <h4>Show</h4>

        <div class="row">
            <div class="col s12 m6 l6">
                <div class="carousel carousel-slider " data-indicators="true" >

                    @forelse($imovel->imovelFotos as $foto)
                        <a class="carousel-item" href="#">
                            <img src="{{$foto->path_images}}" class="responsive-img" style="width: 100%; height: 100%;">
                        </a>
                    @empty
                    @endforelse
                </div>
            </div>


            <div class="col s12 m6 l6">
                <p class="big"><strong>Tipo: </strong> {{$imovel->tipo->nome}}</p>
                <p class="big"><strong>Cidade: </strong>{{$imovel->cidade->nome}}</p>

                <p class="big"><strong>Rua: </strong> {{$imovel->endereco->rua}}</p>
                <p class="big"><strong>Número: </strong> {{$imovel->endereco->numero}}</p>
                <p class="big"><strong>Bairro: </strong> {{$imovel->endereco->bairro}}</p>
                <p class="big"><strong>Complemento: </strong> {{$imovel->endereco->complemento}}</p>


                <p class="big"><strong>Finalidade: </strong> {{$imovel->finalidade->nome}}</p>

                <p class="big"><strong>Valor R$:</strong>{{number_format($imovel->preco, 2, ',', '.')}}</p>

                <p><strong> Pontos de Referências próximos:</strong></p>

                @forelse($imovel->proximidades as $proximidade)

                    {{$proximidade->nome}} ,


                @empty

                @endforelse
            </div>
        </div>
        <hr>
        <div>
            <a href="{{url()->previous()}}" class="btn-flat waves-effect  white-text red lighten-3">
                Voltar
            </a>
            <a href="{{route('imoveis.edit',$imovel->id)}}" class="btn-flat waves-effect white-text blue">
                Editar
            </a>
        </div>

    </section>
    {{--    <script>--}}
    {{--        $('.carousel.carousel-slider').carousel({fullWidth: true});--}}

    {{--    </script>--}}
    <script>
        $(document).ready(function () {

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true
            });
            setInterval(function () {
                $('.carousel').carousel('next');
            }, 10000);
            $('.slider').slider();
        });
    </script>

@endsection
