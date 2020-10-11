@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Meus dados</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <h3 class="text-center">Meus dados</h3>
    <hr>
    <div class="row justify-content-center">
      <div class="col-5">
        <h4>{{$user->costumer->firstName}} {{$user->costumer->lastName}}</h4>
        <h5>E-mail: {{$user->costumer->email}}</h5>
        <h5>Tel: ({{$user->costumer->phoneCode1}}) {{$user->costumer->phone}}</h5>
        <h5>Endereço: {{$user->costumer->street}}</h5>
      </div>
      <div class="col-5">
        <a href="../editar/{{$user->id}}" style="color:black"><h4>Editar dados</h4></a>
        <br>
        <a href="meus_pedidos" style="color:black"><h4>Meus pedidos<h4></a>
        </div>
      </div>
    </div>

  </body>
  @include('footer')
  </html>
