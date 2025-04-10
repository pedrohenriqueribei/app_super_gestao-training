<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametroController extends Controller
{     
    public function aula42(int $p1, int $p2){
        echo "A soma $p1 + $p2 = ".($p1+$p2);
    }

    public function aula43(int $p1, int $p2) {

        //array associativo - aula 43
        //return view('site.parametro', ['x' => $p1,'y' => $p2]);

        //compact - aula 43
        //return view('site.parametro', compact('p1', 'p2'));

        //with - aula 43
        return view('site.parametro')->with('p1', $p1)->with('p2', $p2);
    }
}
