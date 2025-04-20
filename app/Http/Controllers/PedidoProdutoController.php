<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
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

        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');

        $pedidoProduto->save();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido]);

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
