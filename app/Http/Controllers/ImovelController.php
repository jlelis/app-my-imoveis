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
    public function index(Request $request)
    {

        $imoveis = Imovel::with(['finalidade', 'endereco', 'cidade', 'proximidades', 'tipo', 'imovelFotos']);

        if ($request->all()) {
            if ($request->input('descricao')) {
                $descricao = $request->input('descricao');
                $imoveis = $imoveis->where('descricao', 'LIKE', '%' . $descricao . '%');
            }
            if ($request->input('valor_minino') && $request->input('valor_maximo')) {
                $minimo = $request->input('valor_minino');
                $maximo = $request->input('valor_maximo');

                $imoveis = $imoveis->whereBetween('preco', [$minimo, $maximo]);
            }


            $imoveis = $imoveis->paginate(9);

            return view('index', compact('imoveis'));
        }
        $imoveis = $imoveis->paginate(9);

        return view('index', compact('imoveis'));

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
        return view(
            'admin.imoveis.create',
            compact('action', 'cidades', 'finalidades', 'tipos', 'proximidades')
        );
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
//            $user = User::where('id','=', 1)->get();

            $imovel = Imovel::create($request->all());
//            $imovel->user()->create($user);//teste aqui
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
            // Deletar dps teste heroku
//            if (!App::environment('local')){
//                $user = User::find(1)->dd();
//                $imovel = $user->imoveis()->save($imovel);

//            }


            DB::commit();

            $request->session()->flash('sucesso', 'Im??vel Cadastrado com sucesso!');
            return redirect()->route('imoveis.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $request->session()->flash('erro', 'Im??vel Cadastrado com sucesso!' . $e->getMessage());
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
        return view(
            'admin.imoveis.edit',
            compact('action', 'imovel', 'cidades', 'finalidades', 'tipos', 'proximidades')
        );
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

            $request->session()->flash('sucesso', 'Im??vel Atualizado com sucesso!');
            return redirect()->route('imoveis.index');
        } catch (\Exception $e) {
            $request->session()->flash('erro', 'Erro Im??vel n??o foi Atualizado !' . $e->getMessage());
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

            $request->session()->flash('sucesso', 'Im??vel exclu??do com sucesso!');
            return redirect()->route('imoveis.index');
        } catch (\Exception $e) {

            DB::rollBack();
            $request->session()->flash('erro', 'Erro Im??vel n??o foi Atualizado !' . $e->getMessage());
            return redirect()->route('imoveis.index');
            // ->with('warning', 'Something Went Wrong!');

        }
    }

    public function getQuery(Request $request)
    {
        //  dd($request->all());
        $query = Imovel::query();

        $termos = $request->only('titulo', 'descricao');

        foreach ($termos as $nome => $valor) {
            if ($valor) {
                $query->where($nome, 'LIKE', '%' . $valor . '%');
            }
        }

        // $iguais = $request->only('fornecedor_id', 'usuario_id', 'codigo_barra');

        // foreach ($iguais as $nome => $valor) {
        //     if ($valor) {
        //         $query->where($nome, '=', $valor);
        //     }
        // }
        // dd($query);
        if (empty($query)) {
            return "N??o a Dados";
        } else {
            $imoveis = $query->paginate(9);
            //   return view('apontamento.consulta')->with('a',$retorno[0]);
            return view('admin.imoveis.index', compact('imoveis'));
        }

        // return $imoveis;

    }
}
