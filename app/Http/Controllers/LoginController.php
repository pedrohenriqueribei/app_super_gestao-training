<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if($request->get('erro') == 1){
            //recuperar o erro - aula 150
            $erro = 'Usuário e/ou senha inválidos';
        }

        if($request->get('erro') == 2) {
            $erro = 'Necessário fazer login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha'  => 'required'
        ];

        //as mensagens de validação
        $feedback = [
            'usuario.email' => 'O campo usuário é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];
        
        $request->validate($regras, $feedback);

        //recuperando os dados do formulário
        $usuario = $request->get('usuario');
        $senha = $request->get('senha');

        //iniciar o Model User
        $user = new User();
        $user_logado = $user->where('email', $usuario)->where('password', $senha)->get()->first();

        if(isset($user_logado->name)){
            
            session_start();
            $_SESSION['nome'] = $user_logado->name;
            $_SESSION['email']= $user_logado->email;

            return redirect()->route('app.home');
        }
        else {
            
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    // aula 153
    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
