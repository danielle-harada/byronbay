@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Produto</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row mt-5">
      <div class="col-4">
        <img src="{{asset($produto->photo)}}" alt="produto" width="100%" height="300w">
      </div>
      <div class="col-4">
        <h3>{{$produto->productName}}</h3>
        <h4>Peso: {{$produto->weight}}g</h4>
        <h4>Moagem: {{$produto->grain}}</h4>
        <h4>Produtor: {{$produto->seller->brandName}}</h4>
        <br>
        <p class="text-justify">{{$produto->description}}</p>
      </div>
      <div class="col-4">
        <h3>R$ {{$produto->price}}</h3>
        <hr>
        <form class="" action="/carrinho/adicionar" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$produto->id}}">
          <button class="btn btn-large">COMPRAR</button>
        </form>
      </div>
      </div>
    </div>

</body>
@include('footer')
</html>
<!-- SITE PARA PEGAR O JAVASCRIPT DO BOTÃO DE QTDE -->
<!-- https://traydevelopers.zendesk.com/hc/pt-br/articles/212063398-Bot%C3%B5es-Quantidade -->
