<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //aula 164
        $produtos = Produto::with(['produtoDetalhe', 'fornecedor'])->paginate(15);
        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // aula 165
        $unidades = Unidade::all();

        //aula 188
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate($this->regras(), $this->feedbacks());

        //aula 166
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //aula 168
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //aula 169
        $unidades = Unidade::all();

        //aula 188
        $fornecedores = Fornecedor::all();

        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
        //aula 173
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //AULA 170
        //$request->all(); //payload (com dados atualizados)
        
        //$produto->getAttributes(); //instância do objeto no estado anterior (do banco)

        $request->validate($this->regras(), $this->feedbacks());

        $produto->update($request->all()); // dar update em produto com os dados atualizados da requisição

        return redirect()->route('produto.show', ['produto' => $produto]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
        
    }

    //aula 167
    public function regras(){
        return  [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];
    } 

    

    public function feedbacks(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute ultrapassou a quantidade máxima de caracteres',
            'peso.integer' => 'O campo :attribute deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'Um fornecedor deve ser escolhido'
        ];
    } 
}
