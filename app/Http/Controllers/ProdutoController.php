<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // aula 152
    public function index() {
        return view('app.produto');
    }
}
