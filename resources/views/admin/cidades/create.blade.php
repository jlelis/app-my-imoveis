@extends('layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{route('cidades.store')}}" method="post" enctype="multipart/form-data">
            {{-- cross-site request forgery csrf--}}
            @csrf
            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome')}}">
                <label for="nome">Nome Cidade:</label>
                @error('nome')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="right-align ">
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
