<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){

        //aula 152
        return view('app.fornecedor');







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
    }
}
