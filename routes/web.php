<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::middleware(LogAcessoMiddleware::class)
//     ->get('/', 'PrincipalController@principal')  
//     ->name('site.index');
Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@salvar')->name('site.contato.salvar');
Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('site.login.auth');

Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function(){
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');
    Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');
    
    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar'); // esse get aqui é só pra pessoa poder acessar o site / .../cadastro, e o post vai ser pra quando apertar o botao
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'App\Http\Controllers\FornecedorController@excluir')->name('app.fornecedor.excluir');
    
    Route::resource('/produto', 'App\Http\Controllers\ProdutoController');

    Route::resource('/produto-detalhe', 'App\Http\Controllers\ProdutoDetalheController');

    Route::resource('/cliente', 'App\Http\Controllers\ClienteController');
    Route::resource('/pedido', 'App\Http\Controllers\PedidoController');
    //Route::resource('/pedido-produto', 'App\Http\Controllers\PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'App\Http\Controllers\PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'App\Http\Controllers\PedidoProdutoController@store')->name('pedido-produto.store');
    //Route::delete('pedido-produto/destroy/{pedido}/{produto}', 'App\Http\Controllers\PedidoProdutoController@destroy')->name('pedido-produto.destroy');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', 'App\Http\Controllers\PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', 'App\Http\Controllers\TesteController@teste')->name('site.teste');

Route::fallback(function(){
    echo 'A rota acessada não existe :(  <a href="'.route('site.index').'">Clique aqui</a> para ir para a pagina inicial';
});