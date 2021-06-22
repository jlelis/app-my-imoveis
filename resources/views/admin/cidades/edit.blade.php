@extends('layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{route('cidades.update',$cidade->id)}}" method="post">
            {{-- cross-site request forgery csrf--}}
            @csrf
            @method('PUT')
            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{$cidade->nome}}">
                <label for="nome">Editar Nome da Cidade:</label>
                @error('nome')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>
            <div class="right-align">
                <a href="{{route('cidades.index')}}" class="btn-flat waves-effect">
                    Cancelar
                </a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>


        </form>
    </section>
@endsection
