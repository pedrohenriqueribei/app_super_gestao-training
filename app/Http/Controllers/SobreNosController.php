<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Controllers\Controller;


class SobreNosController extends Controller
{
    public function __construct()
    {
        //$this->middleware(LogAcessoMiddleware::class);
    }

    public function main(){
        return view('site.sobre-nos');
    }
}
