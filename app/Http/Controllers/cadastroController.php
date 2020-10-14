<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\seller;
use App\Models\costumer;
use App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class cadastroController extends Controller
{
  use RegistersUsers;
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('guest');
  }

    public function cadastrarProdutor(Request $request){
        if ($request->isMethod('GET')){
          return view ('produtores.cadastro');
        }

        $mensagem = [
          "required" => "O campo :attribute é obrigatório"
        ];

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
          'email' => 'required|max:80|unique:users',
          'password' => 'required|max:30|min:6|confirmed',
          'photo' => 'required',
        ], $mensagem);

        $timestamp = date_format(date_create(), 'YmdHism');
        $nomeImg = $request -> file('photo')->getClientOriginalName();
        $save = $request -> file('photo')->storeAs("public/img", $timestamp.$nomeImg);
        $url='storage/img/'.$timestamp.$nomeImg;

        $user = new User();
        $user -> name = $validateData['corpName'];
        $user -> email = $validateData['email'];
        $user -> password = Hash::make($validateData['password']);
        $user -> type = 'produtor';
        $user -> save();

        $produtor = new seller();
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
        $produtor -> password = Hash::make($validateData['password']);
        $produtor -> photo = $url;
        $produtor -> user_id = $user['id'];
        $resultado = $produtor -> save();

        $usuario = $produtor['brandName'];

        return view('cad_ok', ['usuario'=>$usuario],['user'=>$user]);
      }

      public function cadastrarCliente(Request $request, costumer $cliente, User $user){
          if ($request->isMethod('GET')){
            return view ('clientes.cadastro');
          }

          $mensagem = [
            "required" => "O campo :attribute é obrigatório"
          ];

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
            'email' => 'required|max:80|unique:users',
            'password' => 'required|max:30|min:6|confirmed',
          ], $mensagem);

          $user = new User();
          $user -> name = $validateData['firstName'].' '.$validateData['lastName'];
          $user -> email = $validateData['email'];
          $user -> password = Hash::make($validateData['password']);
          $user -> type = 'cliente';
          $user -> save();

          $cliente = new costumer();
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
          $cliente -> user_id = $user['id'];
          $resultado = $cliente -> save();

          $usuario = $cliente['firstName'];

          return view('cad_ok', ['usuario'=>$usuario],['user'=>$user]);
        }
}
