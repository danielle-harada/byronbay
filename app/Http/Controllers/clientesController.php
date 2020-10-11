<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\seller;
use App\Models\costumer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;


class clientesController extends Controller
{
// use VerifiesEmails;
// protected $redirectTo = RouteServiceProvider::HOME;

public function __construct()
{
    $this->middleware('auth');
}

  public function visualizar(Request $request, costumer $cliente, User $user) {
    $cliente = costumer::where('user_id', Auth::id())->get();
    return view ('clientes.dados', ['cliente'=>$cliente], ['user'=>$user]);
  }

  public function editar(Request $request, costumer $cliente, User $user){
    $cliente = costumer::where('user_id', Auth::id())->get();
    return view ('clientes.editar', ['cliente'=>$cliente], ['user'=>$user]);

  }

  public function atualizar(Request $request, costumer $cliente, User $user){
    $cliente = costumer::where('user_id', Auth::id())->first();

    $validateData = $request->validate([
      'firstName' => 'required|max:250',
      'lastName' => 'required|max:200',
      'cpf' => 'required|max:14',
      'cep' => 'required|max:8',
      'street' => 'required|max:200',
      'number' => 'required|max:10',
      'adressComp' => 'required|max:50',
      'city' => 'required|max:100',
      'state' => 'required|max:2',
      'phoneCode1' => 'required|max:2',
      'phone' => 'required|max:9',
      'email' => 'max:80|unique:users',
      'password' => 'required|max:30|min:6|confirmed',
    ]);

    $cliente -> firstName = $validateData['firstName'];
    $cliente -> lastName = $validateData['lastName'];
    $cliente -> cpf = $validateData['cpf'];
    $cliente -> cep = $validateData['cep'];
    $cliente -> street = $validateData['street'];
    $cliente -> number = $validateData['number'];
    $cliente -> adressComp = $validateData['adressComp'];
    $cliente -> city = $validateData['city'];
    $cliente -> state = $validateData['state'];
    $cliente -> phoneCode1 = $validateData['phoneCode1'];
    $cliente -> phone = $validateData['phone'];
    $cliente -> email = $validateData['email'];
    $cliente -> password = Hash::make($validateData['password']);
    $cliente -> user_id = Auth::id();
    $resultado = $cliente -> save();


    $user -> name = $validateData['firstName'].' '.$validateData['lastName'];
    $user -> email = $validateData['email'];
    $user -> password = Hash::make($validateData['password']);
    $user -> type = 'cliente';
    $user -> save();

    return redirect('clientes/dados/'.Auth::id());
  }
}
