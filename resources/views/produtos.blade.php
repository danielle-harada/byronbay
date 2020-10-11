@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Nossos produtos</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <h2 class="text-center">NOSSOS CAFÉS</h2>
    <hr>
    <div class="row">
      @foreach ($produtos as $produto)
          <div class="col-4">
            <a href="/produto/{{$produto->id}}">
              <img class="rounded mx-auto d-block" src="{{asset($produto->photo)}}" alt="" width="50%" height="150w"></a>
              <h5 class="text-center font-weight-bold">{{$produto->productName}}</h5>
              <div class="row">
                <div class="col-6">
                  <p class="text-center align-bottom font-weight-bold">R$ {{$produto->price}}</p>
                </div>
                <div class="col-6">
                  <a href="/produto/{{$produto->id}}" class="btn" type="button" name="button">Comprar</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <br>
        </div>
        {{$produtos->links("pagination::bootstrap-4")}}
  </body>
  @include('footer')
</html>
