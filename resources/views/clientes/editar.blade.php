@include('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cadastro de cliente</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-center">Editar cadastro de cliente</h2>
        <hr>
        <form action="/clientes/editar/{{$user->costumer->user_id}}" method="post">
          @csrf
          <div class="form-group">
            <label for="firstName">Nome</label>
            <input type="text" class="form-control" name="firstName" value="{{$user->costumer->firstName}}">
          </div>
          <div class="form-group">
            <label for="lastName">Sobrenome</label>
            <input type="text" class="form-control" name="lastName" value="{{$user->costumer->lastName}}">
          </div>
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" value="{{$user->costumer->cpf}}">
          </div>
          <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" value="{{$user->costumer->cep}}">
          </div>
          <div class="form-group">
            <label for="street">Endereço</label>
            <input type="text" class="form-control" name="street" value="{{$user->costumer->street}}">
          </div>
          <div class="form-group">
            <label for="number">Número</label>
            <input type="text" class="form-control" name="number" value="{{$user->costumer->number}}">
          </div>
          <div class="form-group">
            <label for="adressComp">Complemento</label>
            <input type="text" class="form-control" name="adressComp" value="{{$user->costumer->adressComp}}">
          </div>
          <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" name="city" value="{{$user->costumer->city}}">
          </div>
          <div class="form-group">
            <label for="state">Estado</label>
            <input type="text" class="form-control" name="state" value="{{$user->costumer->state}}">
          </div>
          <div class="form-group">
            <label for="phoneCode1">DDD</label>
            <input type="number" class="form-control" name="phoneCode1" value="{{$user->costumer->phoneCode1}}">
          </div>
          <div class="form-group">
            <label for="phone">Telefone/Celular</label>
            <input type="number" class="form-control" name="phone" value="{{$user->costumer->phone}}">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="nome@exemplo.com" value="{{$user->costumer->email}}">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="password-confirm">Confirmação de senha</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
          </div>
          <button type="submit" class="btn btn-lg btn-block" name="button">Atualizar</button>
        </form>
      </div>
    </div>
  </div>
</body>
 @include('footer')

</html>
