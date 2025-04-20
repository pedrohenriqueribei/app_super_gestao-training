<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Laravel\Prompts\Clear;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $clientes = Cliente::paginate(15);

        return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate($this->regras(), $this->feedbacks());

        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
        
        return view('app.cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
        return view('app.cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $request->validate($this->regras(), $this->feedbacks());

        $cliente->update($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();

        return redirect()->route('cliente.index');
    }

    //validação
    public function regras () {
        return [
            'nome' => 'required|min:3|max:50'
        ];
    }

    //mensagem de validação
    public function feedbacks() {
        return [
            'required' => 'O campo nome é obrigatório',
            'min' => 'É necessário informar ao menos 3 caracteres',
            'max' => 'Até 50 caracteres são permitidos'
        ];
    }
}
