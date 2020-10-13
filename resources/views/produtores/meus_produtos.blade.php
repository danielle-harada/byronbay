@include ('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Meus produtos</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-center">Meus produtos</h2>
        <a href="/produtos/cadastro/{{Auth::id()}}" class="float-right font-weight-bold" style="color:black;">Cadastrar novo produto</a>
        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Produto</th>
              <th scope="col">Preço</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($produtos as $produto)
              <tr>
                <td>{{$produto->productName}}</td>
                <td>R$ {{$produto->price}}</td>
                <td><a class="font-weight-bold" style="color:black" href="/produtos/editar/{{$produto->id}}">Editar</a></td>
                <td><a class="font-weight-bold" style="color:black" href="/deletar/{{$produto->id}}">Excluir</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$produtos->links("pagination::bootstrap-4")}}
        <a href="/produtores/dados/{{Auth::id()}}" class="btn" type="button" name="button">Voltar</a>
      </div>
    </div>
  </div>

  <!-- MOSTRAR MSG DE SUCESSO -->
      @if(isset($resultado))
        @if($resultado)
          <div class="alert alert-success text-center" role="alert">
            Produto cadastrado com sucesso!
          </div>
        @else
          <div class="alert alert-danger" role="alert">
            Erro ao salvar!
          </div>
        @endif
      @endif

</body>
@include ('footer')
</html>
