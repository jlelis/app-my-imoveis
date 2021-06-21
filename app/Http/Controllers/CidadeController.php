<?php

namespace App\Http\Controllers;

use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subTitulo = 'Lista de Cidades';

        $cidades = Cidade::all();
        return view('admin.cidades.index', compact('cidades', 'subTitulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
    {

        Cidade::create($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome cadastrada com sucesso!");
        return redirect()->route('cidade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidade::findOrFail($id);
        return view('admin.cidades.edit', compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::findOrFail($id);
        $cidade->update($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome alterada com sucesso!");
        return redirect()->route('cidade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        $cidade = Cidade::findOrFail($id);
        $nomeCiddade = $cidade->nome;
        $cidade->delete();
        $request->session()->flash('sucesso', "Cidade $nomeCiddade excluida com sucesso!");
        return redirect()->route('cidade.index');

    }
}
