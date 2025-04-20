<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        //passar produtos
        $produtos = Produto::all();

        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        //validação
        $request->validate($this->regras(), $this->mensagens());


        echo '<pre>';
        print_r($pedido);
        echo '</pre>';
        
        echo '<br>';

        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //regras de validação
    public function regras() {
        return [
            'produto_id' => 'exists:produtos,id'
        ];
    }

    // mensagens de validação
    public function mensagens() {
        return [
            'produto_id.exists' => 'Informar um produto é obrigatório'
        ];
    }
}
