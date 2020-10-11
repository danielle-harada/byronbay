@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Byronbay Coffeeshop</title>
</head>
<body>
  <div class="container">
    <br>
    <a href="/produtos">
      <img src="{{asset('banner.PNG')}}" alt="Compre" style="padding-bottom: 50px" width="100%">
    </a>
    <div class="row">
      <img src="{{asset('tarja.jpg')}}" alt="info" class="rounded mx-auto d-block" width="100%">
    </div>
    <hr>
    <h2 class="font-weight-bold">NOSSOS PRODUTOS</h2>
    <div class="row">

      @foreach ($produtos as $produto)
      <div class="col-3">
        <a href="/produto/{{$produto->id}}">
          <img src="{{asset($produto->photo)}}" alt="" class="rounded mx-auto d-block" width="80%" height="140w">
        </a>
        <p class="text-center">{{$produto->productName}}</p>
        <div class="row">
          <div class="col-6">
            <p style="font-weight: bold">R$ {{$produto->price}}</p>
          </div>
          <div class="col-6">
            <a href="/produto/{{$produto->id}}" class="btn" type="button" name="button">COMPRAR</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <br>
    <a href="/produtos" class="float-right" style="color: black; font-weight: bold">Ver todos os produtos</a>
    <br>
    <hr>
    <h2 class="font-weight-bold">NOSSOS PRODUTORES</h2>
    <div class="row">
      @foreach ($produtores as $produtor)
      <div class="col-4">
        <a href="/produtor/{{$produtor->id}}">
          <img src="{{asset($produtor->photo)}}" alt="" width="100%" height="200w"></a>
          <h5 class="text-center font-weight-bold mt-1">{{$produtor->brandName}}</h5>
          <h5 class="text-center">{{$produtor->city}}/{{$produtor->state}}</h5>
        </div>
      @endforeach
      </div>
      <br>
          <a href="/produtores" class="float-right font-weight-bold" style="color: black">Ver todos os produtores</a>
          <br>
          <hr>
          <div class="row">
            <div class="col-4">
              <h3 class="text-center font-weight-bold">TIPOS DE CAFÉ</h3>
            </div>
            <div class="col-4">
              <h3 class="text-center font-weight-bold">DICAS DE PREPARO</h3>
            </div>
            <div class="col-4">
              <h3 class="text-center font-weight-bold">HISTÓRIA</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <a href="tipos">
              <img src="tipos.jpg" alt="" width="100%" height="250w"></a>
            </div>
            <div class="col-4">
              <a href="dicas">
              <img src="dicas.jpg" alt="" width="100%" height="250w"></a>
            </div>
            <div class="col-4">
              <a href="historia">
              <img src="cultivo.jpg" alt="" width="100%" height="250w"></a>
            </div>
          </div>
        </div>
      </body>
  @include('footer')
      </html>
