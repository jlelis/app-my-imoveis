@extends('layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <table class="highlight">
            <thead>
            <tr>
                <th>Cidades</th>
                <th class="right-align">Opções</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cidades as $cidade)
                <tr>
                    <td>{{$cidade->nome}}</td>
                    <td class="right-align">
                        <a href="{{route('cidades.edit',$cidade->id)}}" class="">
                        <span>
                            <i class="material-icons blue-text accent-2">edit</i>
                        </span>
                        </a>
                        <form action="{{route('cidades.destroy',$cidade->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: 0;background: transparent; ">
                                <span style="cursor: pointer;">
                                    <i class="material-icons red-text accent-3">delete_forever</i>
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Não existem cidades cadastradas.</td>
                </tr>

            @endforelse
            </tbody>
        </table>

        {{--        btn-floating btn-large waves-effect waves-light--}}
        <div class="row">
            <div class="center-align">
                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large waves-effect waves-light" href="{{route('cidades.create')}}">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection
