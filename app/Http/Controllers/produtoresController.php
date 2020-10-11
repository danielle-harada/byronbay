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

class produtoresController extends Controller
{
  // use VerifiesEmails;
  // protected $redirectTo = RouteServiceProvider::HOME;

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function visualizar(Request $request, seller $produtor, User $user) {
    $produtor = seller::where('user_id', Auth::id())->get();
    return view ('produtores.dados', ['produtor'=>$produtor], ['user'=>$user]);
  }

  public function editar(Request $request, seller $produtor, User $user){
    $produtor = seller::where('user_id', Auth::id())->get();
    return view ('produtores.editar', ['produtor'=>$produtor], ['user'=>$user]);
  }

  public function atualizar(Request $request, seller $produtor, User $user){
    $produtor = seller::where('user_id', Auth::id())->first();

    $validateData = $request->validate([
      'corpName' => 'required|max:250',
      'brandName' => 'required|max:200',
      'cnpj' => 'required|max:14',
      'cep' => 'required|max:8',
      'street' => 'required|max:200',
      'number' => 'required|max:10',
      'adressComp' => 'required|max:50',
      'city' => 'required|max:100',
      'state' => 'required|max:2',
      'phoneCode1' => 'required|max:2',
      'phone' => 'required|max:9',
      'description' => 'max:500',
      'email' => 'max:80',
      'password' => 'required|max:30',
    ]);

    if (isset($request['photo'])) {
      $timestamp = date_format(date_create(), 'YmdHism');
      $nomeImg = $request -> file('photo')->getClientOriginalName();
      $save = $request -> file('photo')->storeAs("public/img", $timestamp.$nomeImg);
      $url='storage/img/'.$timestamp.$nomeImg;

      $produtor -> corpName = $validateData['corpName'];
      $produtor -> brandName = $validateData['brandName'];
      $produtor -> cnpj = $validateData['cnpj'];
      $produtor -> cep = $validateData['cep'];
      $produtor -> street = $validateData['street'];
      $produtor -> number = $validateData['number'];
      $produtor -> adressComp = $validateData['adressComp'];
      $produtor -> city = $validateData['city'];
      $produtor -> state = $validateData['state'];
      $produtor -> phoneCode1 = $validateData['phoneCode1'];
      $produtor -> phone = $validateData['phone'];
      $produtor -> description = $validateData['description'];
      $produtor -> email = $validateData['email'];
      $produtor -> password = $validateData['password'];
      $produtor -> photo = $url;
      $produtor -> user_id = Auth::id();
      }

       else {
         $produtor -> corpName = $validateData['corpName'];
         $produtor -> brandName = $validateData['brandName'];
         $produtor -> cnpj = $validateData['cnpj'];
         $produtor -> cep = $validateData['cep'];
         $produtor -> street = $validateData['street'];
         $produtor -> number = $validateData['number'];
         $produtor -> adressComp = $validateData['adressComp'];
         $produtor -> city = $validateData['city'];
         $produtor -> state = $validateData['state'];
         $produtor -> phoneCode1 = $validateData['phoneCode1'];
         $produtor -> phone = $validateData['phone'];
         $produtor -> description = $validateData['description'];
         $produtor -> email = $validateData['email'];
         $produtor -> password = $validateData['password'];
         $produtor -> user_id = Auth::id();
      }

      $user -> name = $validateData['brandName'];
      $user -> email = $validateData['email'];
      $user -> password = Hash::make($validateData['password']);
      $user -> type = 'produtor';
      $user -> save();

    $resultado = $produtor -> save();

    return redirect('produtores/dados/'.Auth::id());
  }
}
