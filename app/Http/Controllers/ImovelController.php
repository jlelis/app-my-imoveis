<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Finalidade;
use App\Models\Imovel;
use App\Models\Proximidade;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imoveis = Imovel::join('cidades', 'cidades.id', '=', 'imoveis.cidade_id')
            ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id')
            ->orderBy('cidades.nome', 'asc')
            ->orderBy('enderecos.bairro', 'asc')
            ->orderBy('titulo', 'asc')
            ->get();

        return view('admin.imoveis.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();
        $tipos = Tipo::all();

        $action = route('imoveis.store');
        return view('admin.imoveis.create',
            compact('action', 'cidades', 'finalidades', 'tipos', 'proximidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $imovel = Imovel::create($request->all());
            $imovel->endereco()->create($request->all());

            if ($request->has('proximidade')) {
//                $imovel->proximidades()->attach($request->proximidades);
//                $imovel->proximidades()->detach($request->proximidades);
                $imovel->proximidades()->sync($request->proximidades);

            }

            DB::commit();

            $request->session()->flash('sucesso', 'Imóvel Cadastrado com sucesso!');
            return redirect()->route('imoveis.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('imoveis.index')
                ->with('warning', 'Something Went Wrong!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imovel = Imovel::findOrFail($id);
        dd($imovel);
    }
}
