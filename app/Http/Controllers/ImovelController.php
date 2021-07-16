<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelRequest;
use App\Models\Cidade;
use App\Models\Finalidade;
use App\Models\Imovel;
use App\Models\ImovelFoto;
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
        $imoveis = Imovel::with(['finalidade', 'endereco', 'cidade', 'proximidades', 'tipo', 'imovelFotos'])
//            ->join('cidades', 'cidades.id', '=', 'imoveis.cidade_id')
//            ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id')
//            //fotos
//            ->join('imovel_fotos', 'imovel_fotos.imovel_id', '=', 'imoveis.id')
//            ->with(['finalidade','endereco', 'cidade', 'proximidades', 'tipo', 'imovelFotos'])
//            ->orderBy('cidades.nome', 'asc')
//            ->orderBy('enderecos.bairro', 'asc')
//            ->orderBy('titulo', 'asc')
            ->get();
//        dd($imoveis);

        return view('index', compact('imoveis',));
//        return view('admin.imoveis.index', compact('imoveis'));
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
    public function store(ImovelRequest $request)
    {
        DB::beginTransaction();
        try {

            $imovel = Imovel::create($request->all());
            $imovel->endereco()->create($request->all());

            if ($request->has('proximidades')) {
//                $imovel->proximidades()->attach($request->proximidades);
//                $imovel->proximidades()->detach($request->proximidades);
                $imovel->proximidades()->sync($request->proximidades);

            }

            //anexar de fotos
            if ($request->hasFile('imovel_fotos')) {

                foreach ($request->file('imovel_fotos') as $file) {

//                    $filename = $file->store('photos', 'public');
                    $filename = $file->storeOnCloudinary('imoveis/' . $imovel->id)->getSecurePath();

                    ImovelFoto::create([
                        'imovel_id' => $imovel->id,
                        'path_images' => $filename,
                    ]);
                }
            }


            DB::commit();

            $request->session()->flash('sucesso', 'Imóvel Cadastrado com sucesso!');
            return redirect()->route('imoveis.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $request->session()->flash('erro', 'Imóvel Cadastrado com sucesso!' . $e->getMessage());
            return redirect()->route('imoveis.index');
//                ->with('warning', 'Something Went Wrong!');

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

        $imovel = Imovel::with(['finalidade', 'endereco', 'cidade', 'proximidades', 'tipo', 'imovelFotos'])->findOrFail($id);
//        dd($imovel);
//            ->join('cidades', 'cidades.id', '=', 'imoveis.cidade_id')
//            ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id')
        //fotos
//            ->join('imovel_fotos', 'imovel_fotos.imovel_id', '=', 'imoveis.id')
//            ->with(['finalidade','endereco', 'cidade', 'proximidades', 'tipo', 'imovelFotos'])
//            ->orderBy('cidades.nome', 'asc')
//            ->orderBy('enderecos.bairro', 'asc')
//            ->orderBy('titulo', 'asc')
//            ->find($id)->get();

        return view('show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'proximidades'])->findOrFail($id);
        $cidades = Cidade::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();
        $tipos = Tipo::all();

        $action = route('imoveis.update', $imovel->id);
        return view('admin.imoveis.edit',
            compact('action', 'imovel', 'cidades', 'finalidades', 'tipos', 'proximidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImovelRequest $request, $id)
    {
        $imovel = Imovel::findOrFail($id);
        DB::beginTransaction();
        try {
            $imovel->update($request->all());
            $imovel->endereco->update($request->all());

            // if ($request->has('proximidades')) {
            $imovel->proximidades()->sync($request->proximidades);
            // }

            //anexar de fotos
            if ($request->hasFile('imovel_fotos')) {

                foreach ($request->file('imovel_fotos') as $file) {

                    $filename = $file->storeOnCloudinary('imoveis/' . $imovel->id)->getSecurePath();

                    ImovelFoto::create([
                        'imovel_id' => $imovel->id,
                        'path_images' => $filename,
                    ]);
                }
            } else {
                //foto default
                $filename = "photos/default_200x200.png";
                ImovelFoto::create([
                    'imovel_id' => $imovel->id,
                    'path_images' => $filename,
                ]);
            }

            DB::commit();

            $request->session()->flash('sucesso', 'Imóvel Atualizado com sucesso!');
            return redirect()->route('imoveis.index');
        } catch (\Exception $e) {
            $request->session()->flash('erro', 'Erro Imóvel não foi Atualizado !' . $e->getMessage());
            DB::rollBack();
            return redirect()->route('imoveis.index');
            // ->with('warning', 'Something Went Wrong!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $imovel = Imovel::findOrFail($id);

        DB::beginTransaction();

        try {

            //remover o endereco
            $imovel->endereco->delete();

            //Remover o imovel
            $imovel->delete();


            DB::commit();

            $request->session()->flash('sucesso', 'Imóvel excluído com sucesso!');
            return redirect()->route('imoveis.index');

        } catch (\Exception $e) {

            DB::rollBack();
            $request->session()->flash('erro', 'Erro Imóvel não foi Atualizado !' . $e->getMessage());
            return redirect()->route('imoveis.index');
            // ->with('warning', 'Something Went Wrong!');

        }
    }
}
