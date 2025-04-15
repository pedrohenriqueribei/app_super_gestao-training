<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){

        //aula 152
        return view('app.fornecedor.index');
    }

    //aula 155
    public function adicionar(Request $request) {
        if($request->input('_token') != ''){
            //validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf'   => 'required|min:2|max:2',
                'email'=> 'email'
            ];

            $feedbacks = [
                'required' => ':attribute deve ser preechido',
                'nome.min' => ' :attribute deve ter no mínimo 3 caracteres',
                'nome.max' => ' :attribute deve ter no máximo 40 caracteres',
                'uf.min'   => ' UF deve ter no mínimo 2 caracteres',
                'uf.max'   => ' UF deve ter no máximo 2 caracteres',
                'email'    => ' :attribute não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedbacks);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }
        return view('app.fornecedor.adicionar');
    }

    //aula 154
    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }
}
//$fornecedores = ['Fornecedor 1', 'Fornecedor 2', 'Fornecedor 3', 'Fornecedor 4', 'Fornecedor 5', 'Fornecedor 6', 'Fornecedor 7', 'Fornecedor 11', 'Fornecedor 8', 'Fornecedor 9', 'Fornecedor 10'];
        //$fornecedores = [];

        //aula 48
        /*
        $fornecedores = [
            0 => [
                'nome' => 'Atacadão Dia a Dia Samambaia', 
                'status' => 'N',
                'cnpj' => '17.457.404/0036-31',
                'ddd' => '61',
                'telefone' => '3423-4343'
            ],
            1 => [
                'nome' => 'Havan Anapolis-GO', 
                'status' => 'S',
                'cnpj' => '79.379.491/0073-58',
                'ddd' => '62',
                'telefone' => '3545-0934'
            ],
            2 => [
                'nome' => 'Park Shopping',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '56',
                'telefone' => '99834-7345'
            ]
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
        */