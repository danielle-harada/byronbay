@include('header')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Bem-vindo</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="alert alert-success" role="alert">
          <h3 class="alert-heading">Bem-vindo, {{$usuario}}!</h3>
          <p>Cadastro realizado com sucesso!!</p>
        </div>
        <a class="float-right" href="dados/{{$user->id}}" style="color:black"><h5>LOGIN</h5></a>
      </div>
    </div>
  </div>
</body>
 @include('footer')
</html>
