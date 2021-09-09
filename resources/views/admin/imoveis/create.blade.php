@extends('layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{$action}}" method="post" enctype="multipart/form-data">
            {{-- cross-site request forgery csrf--}}
            @csrf
            {{--Titulo--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
                    <label for="titulo">Titulo Imóvel:</label>
                    @error('titulo')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{--Input Hidden user_id--}}
            <input type="hidden" name="user_id" value="1">

            {{--Cidades--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select name="cidade_id" id="cidade_id">
                        <option value="" disabled selected>Selecione a Cidade</option>
                        @forelse($cidades as $cidade)
                            <option
                                value="{{$cidade->id}}" {{old('cidade_id') == $cidade->id ? 'selected': ''}}>{{$cidade->nome}}</option>
                        @empty
                            <option value="" disabled selected>Não possivel carregar as cidades</option>
                        @endforelse
                    </select>
                    <label for="cidade_id">Cidade</label>
                    @error('cidade_id')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{--Tipo--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select name="tipo_id" id="tipo_id">
                        <option value="" disabled selected>Selecione um Tipo Imóvel</option>
                        @forelse($tipos as $tipo)
                            <option
                                value="{{$tipo->id}}" {{old('tipo_id') == $tipo->id ? 'selected': ''}}>{{$tipo->nome}}</option>
                        @empty
                            <option value="" disabled selected>Não possivel carregar as tipos</option>
                        @endforelse
                    </select>
                    <label for="tipo_id">Tipos</label>
                    @error('tipo_id')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
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
                <div class="input-field col s12 m12 l12">
                    @forelse($finalidades as $finalidade)
                        <span class="col s12 m12 l12">
                        <label style="margin-right: 30px">
                        <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap"
                               value="{{$finalidade->id}} {{old('finalidade_id') == $finalidade->id ? 'checked': ''}}"/>
                            <span>{{$finalidade->nome}}</span>
                            </label>
                    </span>
                    @empty
                        <span class="col s12 m12 l12">Não possivel carregar as Finalidades</span>
                    @endforelse
                    @error('finalidade_id')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

            </div>
            {{-- Preço Dormitorios Salas --}}
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <input type="number" name="preco" id="preco" min="0.00" max="999999.00" value="{{old('preco')}}"
                           step="0.01">
                    <label for="preco">Preço R$</label>
                    @error('preco')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4 ">
                    <input type="number" name="dormitorios" id="dormitorios" min="1" max="99"
                           value="{{old('dormitorios')}}">
                    <label for="dormitorios">Quantidade Dormitórios</label>
                    @error('dormitorios')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4">
                    <input type="number" name="salas" id="salas" min="1" max="99" value="{{old('salas')}}">
                    <label for="salas">Quantidade de Salas</label>
                    @error('salas')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

            </div>

            {{-- Terreno Banheirose Garagens --}}
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <input type="number" name="terreno" id="terreno" value="{{old('terreno')}}">
                    <label for="terreno">Terreno m²: </label>
                    @error('terreno')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4">
                    <input type="number" name="banheiros" id="banheiros" min="1" max="99" value="{{old('banheiros')}}">
                    <label for="banheiros">Quantidade de banheiros</label>
                    @error('banheiros')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m4 l4">
                    <input type="number" name="garagens" id="garagens" min="1" max="99" value="{{old('garagens')}}">
                    <label for="garagens">Vagas na garagens</label>
                    @error('garagens')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

            </div>

            {{--Descrição--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <textarea name="descricao" id="descricao"
                              class="materialize-textarea">{{old('descricao')}}</textarea>
                    <label for="descricao">Descrição</label>
                    @error('descricao')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>

            {{--endereco--}}
            <div class="row">

                <div class="input-field col s12 m4 l4">
                    <input type="text" name="rua" id="rua" value="{{old('rua')}}">
                    <label for="rua">Rua</label>
                    @error('rua')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="input-field col s12 m2 l2">
                    <input type="text" name="numero" id="numero" value="{{old('numero')}}">
                    <label for="numero">Número</label>
                    @error('numero')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="input-field col s12 m3 l3">
                    <input type="text" name="complemento" id="complemento" value="{{old('complemento')}}">
                    <label for="complemento">Complemento</label>
                    @error('complemento')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="input-field col s12 m3 l3">
                    <input type="text" name="bairro" id="bairro" value="{{old('bairro')}}">
                    <label for="bairro">Bairro</label>
                    @error('bairro')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>

            </div>

            {{-- Proximidades--}}
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select name="proximidades[]" id="proximidades" class="select" multiple>
                        <option value="" disabled>Selecione os pontos de interesse nas proximidades</option>

                        @forelse($proximidades as $proximidade)
                            <option
                                value="{{$proximidade->id}}" @if(old('proximidades')) {{ in_array($proximidade->id,old('proximidades')) ? 'selected' : '' }} @endif >{{$proximidade->nome}}</option>
                        @empty
                            <option value="">Não foi possivel carregar os pontos de interesse nas proximidades</option>
                        @endforelse
                    </select>
                    <label for="proximidades">Pontos de interesse nas proximidades</label>
                    @error('proximidades')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>

            {{--Anexo de fotos--}}
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="imovel_fotos[]" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
            </div>

            <div class="row">
                <div class="right-align">
                    <a href="{{url()->previous()}}" class="btn-flat waves-effect">
                        Cancelar
                    </a>
                    <button class="btn waves-effect waves-light" type="submit">
                        Salvar
                    </button>
                </div>
            </div>


        </form>

    </section>


@endsection
