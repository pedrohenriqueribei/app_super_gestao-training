<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pedidos = Pedido::with('cliente')->paginate(15);
        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();

        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //verificar a validação correta
        $request->validate($this->regras(), $this->mensagens());

        $pedido = new Pedido();
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();

        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //exibir informações de um único pedido
        return view('app.pedido.show', ['pedido' => $pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();

        //encaminha para o formulário
        return view('app.pedido.edit', ['pedido' => $pedido, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //valida
        $request->validate($this->regras(), $this->mensagens());

        //atualiza
        //$pedido->update($request->only(['cliente_id']));
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();

        //redireciona
        return redirect()->route('pedido.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //apaga
        $pedido->delete();

        //redireciona
        return redirect()->route('pedido.index');
    }

    //função que define as regras de validação
    public function regras() {
        return [
            'cliente_id' => 'exists:clientes,id'
        ];
    }

    //função de define as mensagens de validação
    public function mensagens() {
        return [
            'cliente_id.exists' => 'Selecione um cliente'
        ];
    }
}
