<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //verificar se usuário possui acesso a rota
        if(true){
            return $next($request);
        }
        //caso o usuário não seja autenticado
        else {
            return Response("Acesso negado!! Faça login");
        }
    }
}
