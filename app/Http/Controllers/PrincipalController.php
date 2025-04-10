<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function main(){
        //aula 127
        $motivos_contato = MotivoContato::all();
        
        return view('site.principal', ['motivos_contato' => $motivos_contato]);
    }
}
