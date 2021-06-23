@extends('layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{$action}}" method="post">
            {{-- cross-site request forgery csrf--}}
            @csrf
            {{--Titulo--}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
                    <label for="titulo">Titulo Imóvei:</label>
                    @error('titulo')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{--Cidades--}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="cidade_id" id="cidade_id">
                        <option value="" disabled selected>Selecione a Cidade</option>
                        @forelse($cidades as $cidade)
                            <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
                        @empty
                            <option value="" disabled selected>Não possivel carregar as cidades</option>
                        @endforelse
                    </select>
                    <label for="cidade_id">Cidade</label>
                </div>
            </div>
            {{--Tipo--}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="tipo_id" id="tipo_id">
                        <option value="" disabled selected>Selecione um Tipo Imóvel</option>
                        @forelse($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
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
                    <span class="col s2">
                        <label style="margin-right: 30px">
                        <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap"
                               value="{{$finalidade->id}}"/>
                            <span>{{$finalidade->nome}}</span>
                            </label>
                    </span>
                @empty
                    <span class="col s2">Não possivel carregar as Finalidades</span>
                @endforelse

            </div>
            {{-- Preço Dormitorios Salas --}}
            <div class="row">
                <div class="input-field col s3">
                    <input type="number" name="preco" id="preco">
                    <label for="preco">Preço</label>
                </div>

                <div class="input-field col s3">
                    <input type="number" name="dormitorios" id="dormitorios" min="1" max="99">
                    <label for="dormitorios">Quantidade Dormitórios</label>
                </div>

                <div class="input-field col s3">
                    <input type="number" name="salas" id="salas" min="1" max="99">
                    <label for="salas">Quantidade de Salas</label>
                </div>
                <div class="input-field col s3">
                    <input type="number" name="garagens" id="garagens" min="1" max="99">
                    <label for="garagens">Quantidade de Garagens</label>
                </div>

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
