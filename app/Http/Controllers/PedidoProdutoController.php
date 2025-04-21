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

        /*
        //modo convencional
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */

        //vinculando registro por meio do relacionamento 
        $pedido->produtos()->attach($request->get('produto_id'), [
            'quantidade' => $request->get('quantidade')
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido]);

    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Pedido $pedido, Produto $produto)
    public function destroy (PedidoProduto $pedidoProduto) 
    {
        //remover a vinculação de produto com pedidos
        //convencional
        /*
        PedidoProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id
        ])->delete();
        
        //ou
        //$produto->pedidos()->detach($pedido->id);
        */
        
        //dettach (delete pelo relacionamento)
        //$pedido->produtos()->detach($produto->id);

        $pedidoProduto->delete();
        
        return redirect()->route('pedido.show', ['pedido' => $pedidoProduto->pedido_id]);
    }

    //regras de validação
    public function regras() {
        return [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];
    }

    // mensagens de validação
    public function mensagens() {
        return [
            'produto_id.exists' => 'Informar um produto é obrigatório',
            'required' => 'Informe uma quantidade'
        ];
    }
}
