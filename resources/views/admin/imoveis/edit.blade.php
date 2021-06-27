@extends('layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{$action}}" method="post">
            {{-- cross-site request forgery csrf--}}
            @csrf
            @isset($imovel)
                @method('PUT')
            @endisset
            {{--Titulo--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input type="text" name="titulo" id="titulo" value="{{old('titulo',$imovel->titulo ?? '')}}">
                    <label for="titulo">Titulo Imóvei:</label>
                    @error('titulo')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{--Cidades--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select name="cidade_id" id="cidade_id">
                        <option value="" disabled selected>Selecione a Cidade</option>
                        @forelse($cidades as $cidade)
                            <option
                                value="{{$cidade->id}}"
                                {{old('cidade_id', $imovel->cidade->id ?? '' ) == $cidade->id ? 'selected': ''}}
                            >{{$cidade->nome}}</option>
                        @empty
                            <option value="" disabled selected>Não possivel carregar as cidades</option>
                        @endforelse
                    </select>
                    <label for="cidade_id">Cidade</label>
                </div>
            </div>
            {{--Tipo--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select name="tipo_id" id="tipo_id">
                        <option value="" disabled selected>Selecione um Tipo Imóvel</option>
                        @forelse($tipos as $tipo)
                            <option
                                value="{{$tipo->id}}"
                                {{old('tipo_id',$imovel->tipo->id ?? '') == $tipo->id ? 'selected': ''}}>{{$tipo->nome}}</option>
                        @empty
                            <option value="" disabled selected>Não possivel carregar as tipos</option>
                        @endforelse
                    </select>
                    <label for="tipo_id">Tipos</label>
                </div>
            </div>
            {{-- Finalidade 01--}}
            {{--            <div class="input-field">--}}
            {{--                <select name="tipo_id" id="tipo_id">--}}
            {{--                    <option value="" disabled selected>Selecione uma Finalidade Imóvel</option>--}}
            {{--                    @forelse($finalidades as $finalidade)--}}
            {{--                        <option value="{{$finalidade->id}}">{{$finalidade->nome}}</option>--}}
            {{--                    @empty--}}
            {{--                        <option value="" disabled selected>Não possivel carregar as Finalidades</option>--}}
            {{--                    @endforelse--}}
            {{--                </select>--}}
            {{--                <label for="tipo_id">Tipos</label>--}}
            {{--            </div>--}}

            {{-- Finalidade 02--}}
            <div class="row">

                @forelse($finalidades as $finalidade)
                    <span class="col s12 m12 l12">
                        <label style="margin-right: 30px ">
                        <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap"
                               value="{{$finalidade->id}}"
                               {{old('finalidade_id', $imovel->finalidade->id ?? '') == $finalidade->id ? 'checked' : ''}}
                        />
                            <span>{{$finalidade->nome}}</span>
                        </label>
                    </span>
                @empty
                    <span class="col s12 m12 l12">Não possivel carregar as Finalidades</span>
                @endforelse

            </div>
            {{-- Preço Dormitorios Salas --}}
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <input type="number" name="preco" id="preco" value="{{old('preco', $imovel->preco ?? '')}}">
                    <label for="preco">Preço</label>
                    @error('preco')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4">
                    <input type="number" name="dormitorios" id="dormitorios" min="1" max="99"
                           value="{{old('dormitorios',$imovel->dormitorios ?? '')}}">
                    <label for="dormitorios">Quantidade Dormitórios</label>
                    @error('dormitorios')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4">
                    <input type="number" name="salas" id="salas" min="1" max="99"
                           value="{{old('salas',$imovel->salas ?? '')}}">
                    <label for="salas">Quantidade de Salas</label>
                    @error('salas')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

            </div>

            {{-- Terreno Banheirose Garagens --}}
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <input type="number" name="terreno" id="terreno" value="{{old('terreno',$imovel->terreno ?? '')}}">
                    <label for="terreno">Terreno m²: </label>
                    @error('terreno')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4">
                    <input type="number" name="banheiros" id="banheiros" min="1" max="99"
                           value="{{old('banheiros', $imovel->banheiros ?? '')}}">
                    <label for="banheiros">Quantidade de banheiros</label>
                    @error('banheiros')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4">
                    <input type="number" name="garagens" id="garagens" min="1" max="99"
                           value="{{old('garagens',$imovel->garagens ?? '')}}">
                    <label for="garagens">Vagas na garagens</label>
                    @error('garagens')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

            </div>

            {{--Descrição--}}
            <div class="row">
                <div class="input-fiel col s12 m12 l12">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao"
                              class="materialize-textarea">{{old('descricao',$imovel->descricao ?? '')}}</textarea>

                    @error('descricao')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>

            {{--endereco--}}
            <div class="row">

                <div class="input-field col s12 m4 l4">
                    <input type="text" name="rua" id="rua" value="{{old('rua',$imovel->endereco->rua ?? '')}}">
                    <label for="rua">Rua</label>
                    @error('rua')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m2 l2">
                    <input type="text" name="numero" id="numero"
                           value="{{old('numero',$imovel->endereco->numero ?? '')}}">
                    <label for="numero">Número</label>
                    @error('numero')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="input-field col s12 m3 l3">
                    <input type="text" name="complemento" id="complemento"
                           value="{{old('complemento',$imovel->endereco->complemento ?? '')}}">
                    <label for="complemento">Complemento</label>
                    @error('complemento')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="input-field col s12 m3 l3">
                    <input type="text" name="bairro" id="bairro"
                           value="{{old('bairro',$imovel->endereco->bairro ?? '')}}">
                    <label for="bairro">Bairro</label>
                    @error('bairro')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

            </div>

            {{-- Proximidades--}}
            <div class="row">

                <select name="proximidades[]" id="proximidades" multiple>
                    <option value="" disabled>Selecione os pontos de interesse nas proximidades</option>

                    @forelse($proximidades as $proximidade)
                        <option value="{{$proximidade->id}}"
                        @if(old('proximidades'))
                            {{ in_array($proximidade->id,old('proximidades')) ? 'selected' : '' }}

                            @else
                            @isset($imovel)
                                {{$imovel->proximidades->contains($proximidade->id) ? 'selected' : '' }}

                                @endisset
                            @endif
                        >{{$proximidade->nome}}
                        </option>
                    @empty
                        <option value="">Não foi possivel carregar os pontos de interesse nas proximidades</option>
                    @endforelse
                </select>
                <label for="proximidades">Pontos de interesse nas proximidades</label>
                @error('proximidades')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror

            </div>


            {{--buttons--}}
            <div class="right-align">
                <a href="{{url()->previous()}}" class="btn-flat waves-effect">
                    Cancelar
                </a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>


        </form>
    </section>

@endsection
