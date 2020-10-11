<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\seller;
use App\Models\costumer;
use App\Models\product;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class produtoController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function cadastrar (Request $request, seller $produtor, product $produto){
      if ($request->isMethod('GET')){
        return view ('produtos.cadastro');
      }

      $mensagem = [
        "required" => "O campo :attribute é obrigatório"
      ];

      $validateData = $request->validate([
        'productName' => 'required|max:100',
        'description' => 'required|max:500',
        'weight' => 'required',
        'grain' => 'required',
        'price' => 'required',
        'photo' => 'required',
      ], $mensagem);

      $timestamp = date_format(date_create(), 'YmdHism');
      $nomeImg = $request -> file('photo')->getClientOriginalName();
      $save = $request -> file('photo')->storeAs("public/img", $timestamp.$nomeImg);
      $url='storage/img/'.$timestamp.$nomeImg;

      $produto = new product();
      $produto -> productName = $request -> productName;
      $produto -> description = $request -> description;
      $produto -> weight = $request -> weight;
      $produto -> grain = $request -> grain;
      $produto -> price = $request -> price;
      $produto -> photo = $url;
      $produto -> sellerId = Auth::id();

      $resultado = $produto -> save();

      return redirect('/produtores/meus_produtos/'.Auth::id());

      // return view ("meus_produtos", ['resultado'=>$resultado]);
    }

    public function listarProdutos(seller $produtor, User $user, product $produtos){
      $produtos = product::where('sellerId', Auth::id())->paginate(10);
      return view ('produtores.meus_produtos', ['produtos'=>$produtos]);
    }

    public function editar(Request $request, product $produto, User $user){
      $user=Auth::id();
      return view ('produtos.editar', ['produto'=>$produto], ['user'=>$user]);
    }

    public function atualizar(Request $request, product $produto, User $user){
      $validateData = $request->validate([
        'productName' => 'required|max:100',
        'description' => 'required|max:500',
        'weight' => 'required',
        'grain' => 'required',
        'price' => 'required',
      ]);

      if (isset($request['photo'])) {
        $timestamp = date_format(date_create(), 'YmdHism');
        $nomeImg = $request -> file('photo')->getClientOriginalName();
        $save = $request -> file('photo')->storeAs("public/img", $timestamp.$nomeImg);
        $url='storage/img/'.$timestamp.$nomeImg;

        $produto -> productName = $request -> productName;
        $produto -> description = $request -> description;
        $produto -> weight = $request -> weight;
        $produto -> grain = $request -> grain;
        $produto -> price = $request -> price;
        $produto -> photo = $url;
        }

         else {
        $produto -> productName = $request -> productName;
        $produto -> description = $request -> description;
        $produto -> weight = $request -> weight;
        $produto -> grain = $request -> grain;
        $produto -> price = $request -> price;
      }

      $resultado = $produto -> save();
      $user=Auth::id();

      return redirect('/produtores/meus_produtos/'.Auth::id());
    }

    public function deletar(Request $request, product $produto){
      $produto->delete();
      return redirect('produtores/meus_produtos/'.Auth::id());
    }

    public function verDados(seller $produtor, User $user, product $produtos){
      if ($user['type'] === 'produtor'){
        return redirect('produtores/dados/'.Auth::id());
      } else {
        return redirect('clientes/dados/'.Auth::id());
      }
    }

}
