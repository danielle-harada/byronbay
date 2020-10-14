<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'openController@home');

Route::get('/tipos', function () {
    return view('infos.tipos');
});

Route::get('/dicas', function () {
    return view('infos.dicas');
});

Route::get('/historia', function () {
    return view('infos.historia');
});

Route::get('/quem_somos', function () {
    return view('infos.quem_somos');
});

Route::get('/fale_conosco', function () {
    return view('infos.fale_conosco');
});

Route::get('/home', 'openController@home');


Route::get('/produtos', 'openController@visualizarProdutos');

Route::get('/produto/{produto}','openController@verProduto');

Route::get('/produtores', 'openController@visualizarProdutores');

Route::get('/produtor/{id}', 'openController@verProdutor');

Route::get('/produtos/{user}', 'openController@verProdutosProdutor');

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::post('/cad_ok', function () {
    $user=Auth::id();
    return view('cad_ok');
});

Route::get('/produtores/cadastro', 'cadastroController@cadastrarProdutor');
Route::post('/produtores/cadastro', 'cadastroController@cadastrarProdutor');

Route::get('/clientes/cadastro', 'cadastroController@cadastrarCliente');
Route::post('/clientes/cadastro', 'cadastroController@cadastrarCliente');

Route::get('/produtores/dados/{user}', 'produtoresController@visualizar');

Route::get('/clientes/dados/{user}', 'clientesController@visualizar');

Route::get('/produtores/editar/{user}','produtoresController@editar');
Route::post('/produtores/editar/{user}','produtoresController@atualizar');

Route::get('/clientes/editar/{user}','clientesController@editar');
Route::post('/clientes/editar/{user}','clientesController@atualizar');

Route::get('/produtores/meus_produtos/{user}', 'produtoController@listarProdutos');

Route::get('/produtos/cadastro/{user}', 'produtoController@cadastrar');
Route::post('/produtos/cadastro/{user}', 'produtoController@cadastrar');

Route::get('/dados/{user}', 'produtoController@verDados');

Route::get('/produtos/editar/{produto}','produtoController@editar');
Route::post('/produtos/editar/{produto}','produtoController@atualizar');

Route::get('/carrinho', 'carrinhoController@index');

Route::get('/carrinho/adicionar/', 'carrinhoController@adicionar');
Route::post('/carrinho/adicionar/', 'carrinhoController@adicionar');

Route::delete('carrinho/remover', 'carrinhoController@remover');

Route::post('/carrinho/concluir','carrinhoController@concluir');
Route::get('/meus_pedidos/{user}', 'carrinhoController@compras');

Route::get('/pedidos/{order}', 'carrinhoController@verCompra');

Route::get('/ped_ok', function () {
    return view('ped_ok');
});




Route::get('/deletar/{produto}', 'produtoController@deletar');

Route::get('/produtores/produtos/cadastro/{produtor}', 'produtoController@cadastrar');
// Route::post('/produtores/produtos/cadastro/{produtor}', 'produtoController@cadastrar');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
