<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\seller;
use App\Models\costumer;
use App\Models\product;


class openController extends Controller
{
  // public function __construct()
  // {
  //     $this->middleware('guest');
  // }

    public function visualizarProdutos(){
      $produtos = product::paginate(9);
      return view ('produtos',['produtos'=>$produtos]);
    }

    public function verProduto(product $produto, seller $produtor){
      $produtor = seller::where('user_id', $produto['sellerId'])->first();
        return view ('produto', ['produto'=>$produto], ['produtor'=>$produtor]);
    }

    public function visualizarProdutores(){
      $produtores = seller::paginate(9);
      return view ('produtores',['produtores'=>$produtores]);
    }

    public function verProdutor($id){
      $produtor = seller::find($id);
      return view ('produtor', ['produtor'=>$produtor]);
    }

    public function home(){
      $produtos = product::all()->random(4);
      $produtores = seller::all();
        if (sizeof($produtores) > 3){
          $produtores = seller::all()->random(3);
        }
       return view ('home', ['produtos'=>$produtos], ['produtores'=>$produtores]);
    }

    public function verProdutosProdutor(User $user, product $produtos){
      $produtos = product::where('sellerId', $user['id'])->paginate(10);
      return view ('produtos', ['produtos'=>$produtos], ['user'=>$user]);
    }
}
