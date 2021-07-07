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

            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="photos[]" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
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
