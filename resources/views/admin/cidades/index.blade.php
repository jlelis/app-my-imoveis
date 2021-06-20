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
                    <td>{{$cidade}}</td>
                    <td class="right-align">Excluir</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Não existe cidades cadastradas.</td>
                </tr>

            @endforelse
            </tbody>
        </table>
    </section>
@endsection
