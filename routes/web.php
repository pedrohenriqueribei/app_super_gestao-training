<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

    // aula 138                               
    //Route::middleware(LogAcessoMiddleware::class)
    Route::get('/', [PrincipalController::class,'main'])
        ->middleware('log.acesso')
        ->name('site.index');//aula 39

Route::get('/contato', [ContatoController::class,'main'])->name('site.contato');//->middleware(LogAcessoMiddleware::class);
Route::get('/sobre-nos', [SobreNosController::class,'main'])->name('site.sobre-nos');

//aula 68
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');

//aula 37             MOD 11
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login'); //aula 147

//aula 38
Route::middleware('log.acesso','autenticacao')
    ->prefix('/app')->group(function(){
    
        Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
        
    
        //aula 45
        Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
        //aula 154
        Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
        Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar'); //aula 158
        Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
        Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');  //aula 157
        Route::get('/fornecedor/excluir/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir'); //aula 160

        //aula 152
        Route::get('/home', [HomeController::class, 'index'])->name('app.home');
        Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');

        //produtos
        Route::resource('/produto', ProdutoController::class); //aula 161
        //Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');

        //produtos detalhes - aula 175
        Route::resource('produto-detalhe', ProdutoDetalheController::class);
});



Route::get('/contato/{nome}/{categoria_id}', 
    function(
        string $nome, 
        int $categoria_id
    ){
        echo "Contato: $nome :: $categoria_id";
    }
)->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');

//aula 40
Route::get('rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('rota2', function(){
    echo 'Rota 2';
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Route::redirect('/rota2', '/rota1');

//aula 41
Route::fallback(function(){
    echo 'A rota não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para home';
});

//aula 42
Route::get('/parametro/{p1}/{p2}', [\App\Http\Controllers\ParametroController::class, 'aula43'])->name('parametro');

//aula 45





















/*
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = 'Mensagem não informada'){
    echo "Contato: $nome :: $categoria :: $assunto - $mensagem";
});

Route::get('/', function () {
    return "Bem-vindo ao treinamento de Laravel Framework";
});
Route::get('/sobre-nos', function () {
    return "Sobre nós - Laravel Framework";
});

Route::get('/contato', function () {
    return "Contato - Laravel Framework";
});
*/