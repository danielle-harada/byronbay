@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Pedido OK!</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="alert alert-success" role="alert">
          <h3 class="alert-heading text-center">Pedido feito com sucesso!</h3>
          <br>
          <h4 class="text-center">Obrigado!</h4>
        </div>
      </div>
    </div>
  </div>
</body>
@include('footer')
</html>
