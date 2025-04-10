<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
                          //aula 122
    public function main (){

        //aula 127
        $motivos_contato = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (Controller)', 'motivos_contato' => $motivos_contato]);
    }

    //aula 124
    public function salvar (Request $request) {
 
        //dd($request);
        /* PRIMEIRA FORMA
        $contato = new SiteContato();
        $contato->nome = $request->input('nome'); 
        $contato->telefone = $request->input('telefone'); 
        $contato->email = $request->input('email'); 
        $contato->motivo_contato = $request->input('motivo_contato'); 
        $contato->mensagem = $request->input('mensagem'); 
        $contato->save();

        */
        //print_r($contato->getAttributes());

        //validação
        $request->validate([
            'nome' => 'required|min:4|max:50|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ],
        [
            //aula 136
            'nome.required' => 'Este campo precisa ser preenchido',
            'nome.min' => 'Este campo precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter menos de 50 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.required' => 'Telefone precisa ser informado',
            // para geral
            'required' => 'Este campo :attribute precisa ser preenchido!',
            'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
            'mensagem.max' => 'Digite menos de 2000 caracteres'
        ]
        );
        
        //SEGUNDA FORMA
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();

        return redirect()->route('site.index');
    }
}
