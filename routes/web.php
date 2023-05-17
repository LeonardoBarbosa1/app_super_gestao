<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Verbos HTTP
get
post
put
patch
delete
options
*/

/*Route::get('/', function () {
    return "Olá seja bem vindo";
});*/
/*Route::get(
    '/contato/{nome}/{categoria_id}', 
            function(
                string $nome = "Desconhecido", 
                int $categoria_id = 1 //informação
                ){
                echo "Estamos aqui: $nome - $categoria_id";
})->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Route::redirect('/rota2', '/rota1');*/

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');

Route::post('/contato', 'App\Http\Controllers\ContatoController@salvar')->name('site.contato');
Route::post('/login/{erro?}', 'App\Http\Controllers\LoginController@autenticar')->name('site.login');
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');
    Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('app.cliente');

    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');    
    Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');


    Route::get('/produto', 'App\Http\Controllers\ProdutoController@index')->name('app.produto');

});

Route::fallback(function(){
    echo 'A página acessada não existe. <a href="'.route('site.index').'"> Clique aqui </a> para ir para página inicial';
});

Route::get('/teste/{p1}/{p2}', 'App\Http\Controllers\TesteController@teste')->name('site.teste');


