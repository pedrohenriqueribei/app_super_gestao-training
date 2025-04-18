<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $produto_detalhes = ProdutoDetalhe::paginate(20);

        return view('app.produto_detalhe.index', ['produto_detalhes' => $produto_detalhes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //aula 176
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->regras(), $this->feedbacks());

        //aula 176
        ProdutoDetalhe::create($request->all());

        return redirect()->route('produto-detalhe.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //178
        return view('app.produto_detalhe.show', ['produto_detalhe' => $produtoDetalhe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        //aula 177
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        //aula 177
        $produtoDetalhe->update($request->all());

        return redirect()->route('produto-detalhe.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        ProdutoDetalhe::find($id)->delete();
        return redirect()->route('produto-detalhe.index');
    }

    public function regras(){
        return  [
            'produto_id' => 'exists:produtos,id',
            'comprimento' => 'required|integer',
            'altura' => 'required|integer',
            'largura' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];
    } 

    

    public function feedbacks(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'produto_id.exists' => 'O código de produto informado não existe'
        ];
    } 
}
