@include ('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cadastro de produtores</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-center">Editar cadastro de produtor</h2>
        <hr>
        <form action="/produtores/editar/{{$user->seller->user_id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="corpName">Razão Social</label>
            <input type="text" class="form-control" name="corpName" value="{{$user->seller->corpName}}">
          </div>
          <div class="form-group">
            <label for="brandName">Nome Fantasia</label>
            <input type="text" class="form-control" name="brandName" value="{{$user->seller->brandName}}">
          </div>
          <div class="form-group">
            <label for="cnpj">CNPJ ou CPF</label>
            <input type="text" class="form-control" name="cnpj" value="{{$user->seller->cnpj}}">
          </div>
          <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" value="{{$user->seller->cep}}" id="cep">
          </div>
          <div class="form-group">
            <label for="street">Endereço</label>
            <input type="text" class="form-control" name="street" value="{{$user->seller->street}}" id="street">
          </div>
          <div class="form-group">
            <label for="number">Número</label>
            <input type="text" class="form-control" name="number" value="{{$user->seller->number}}" id="number">
          </div>
          <div class="form-group">
            <label for="adressComp">Complemento</label>
            <input type="text" class="form-control" name="adressComp" value="{{$user->seller->adressComp}}" id="adressComp">
          </div>
          <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" name="city" value="{{$user->seller->city}}" id="city">
          </div>
          <div class="form-group">
            <label for="state">Estado</label>
            <input type="text" class="form-control" name="state" value="{{$user->seller->state}}" id="state">
          </div>
          <div class="form-group">
            <label for="phoneCode1">DDD</label>
            <input type="number" class="form-control" name="phoneCode1" value="{{$user->seller->phoneCode1}}">
          </div>
          <div class="form-group">
            <label for="phone">Telefone/Celular</label>
            <input type="number" class="form-control" name="phone" value="{{$user->seller->phone}}">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="nome@exemplo.com" value="{{$user->seller->email}}">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" value="">
          </div>
          <div class="form-group">
            <label for="password-confirm">Confirmação de senha</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
          </div>
          <div class="form-group">
            <label for="description">Sua história</label>
            <textarea class="form-control" name="description" rows="8">{{$user->seller->description}}</textarea>
          </div>
          <div class="form-group">
              <label for="photo">Imagem</label>
              <input type="file" class="form-control-file" name="photo">
              <img src="{{asset($user->seller->photo)}}" alt="">
          </div>
            <button type="submit" class="btn btn-lg btn-block" name="button">Atualizar</button>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{asset('/js/cep.js')}}"></script>  

</body>
@include ('footer')
</html>
