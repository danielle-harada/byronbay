<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\pedido;
use App\Models\order;
use App\Models\product;

class carrinhoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $orders = order::where([
      'status' => 'RE',
      'user_id' => Auth::id()
    ])->get();

    return view ('/carrinho', compact ('orders'));
  }

  public function adicionar(Request $request){
    if ($request->isMethod('GET')){
      return view ('/carrinho');
    }

    $req = Request();
    $idproduto = $req->input('id');
    $qtde = $req->input('quant');

    $produto = product::find($idproduto);
    if (empty($produto->id)){
      $req->session()->flash('mensagem-falha', 'Produto não encontrado');
      return redirect('/carrinho');
    }

    $idusuario = Auth::id();

    $idpedido = order::consultaId([
      'user_id' => $idusuario,
      'status' => 'RE'
    ]);

    if (empty($idpedido)) {
      $pedido_novo = order::create([
        'user_id' => $idusuario,
        'status' => 'RE'
      ]);

      $idpedido = $pedido_novo->id;
    }

    pedido::create([
      'order_id' => $idpedido,
      'product_id' => $idproduto,
      'total' => $produto->price,
      'status' => 'RE'
    ]);

    $req->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho!');
    return redirect ('/carrinho');
  }

  public function remover(){
    $req = Request();
    $idpedido = $req->input('order_id');
    $idproduto = $req->input('product_id');
    $remove_um = (boolean)$req->input('item');
    $idusuario = Auth::id();

    $idpedido = order::consultaId([
      'id' => $idpedido,
      'user_id' => $idusuario,
      'status' => 'RE'
    ]);

    if (empty($idpedido)) {
      $req->session()->flash('mensagem-falha', 'Pedido não encontrado');
      return redirect('/carrinho');
    }

    $where_produto = [
      'order_id' => $idpedido,
      'product_id' => $idproduto
    ];

    $produto = pedido::where($where_produto)->orderBy('id', 'desc')->first();
    if( empty($produto->id)) {
      $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho');
      return redirect('/carrinho');
    }

    if ($remove_um) {
      $where_produto['id']=$produto->id;
    }

    pedido::where($where_produto)->delete();

    $check_pedido = pedido::where([
      'id' => $produto->id])->exists();

    if(!$check_pedido) {
      order::where([
        'id' => $produto->id])->delete();
    }

    $req->session()->flash('mensagem-sucesso', 'Produto removido');
    return redirect('/carrinho');
  }

  public function concluir()
  {
    $req = Request();
    $idpedido = $req->input('order_id');
    $idusuario = Auth::id();

    $check_pedido = order::where([
      'id' => $idpedido,
      'user_id' => $idusuario,
      'status' => 'RE'
    ])->exists();

    if (!$check_pedido) {
      $req->session()->flash('mensagem-falha','Pedido não encontrado');
      return redirect('/carrinho');
    }

    $check_produtos = pedido::where([
      'order_id' => $idpedido
    ])->exists();

    if(!$check_produtos) {
      $req->session()->flash('mensagem-falha','Produtos do pedido não encontrados');
      return redirect('/carrinho');
    }

    pedido::where([
      'order_id' => $idpedido
    ])->update([
      'status' => 'PA'
    ]);

    $order = order::where([
      'id' => $idpedido
    ])->update([
      'status' => 'PA'
    ]);

  $req->session()->flash('mensagem-sucesso','Compra concluída com sucesso');

  return view('/ped_ok',['order'=>$order]);
  }

  public function compras(){
    $compras = order::where([
        'status' => 'PA',
        'user_id' => Auth::id()
    ])->orderBy('created_at','desc')->get();

    $cancelados = order::where([
        'status' => 'CA',
        'user_id' => Auth::id()
    ])->orderBy('updated_at','desc')->get();

    return view ('/meus_pedidos', compact ('compras', 'cancelados'));
  }

  public function VerCompra(pedido $pedido, order $order, product $produto){
    $pedido = pedido::where('order_id', $order['id'])->get();
    return view ('/pedidos', compact ('pedido'));
  }

}
