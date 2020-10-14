@include('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Meus pedidos</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-center">Meus pedidos</h2>
        @forelse ($compras as $pedido)
          <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Pedido</th>
              <th scope="col">Valor</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @php
              $total=0;
            @endphp
            @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
            @php
              $total_produto = $pedido_produto->total;
              $total += $total_produto;
            @endphp
            <td>{{$pedido->id}}</td>
            <td>{{$total}}</td>
            @endforeach
            <td><a href="/pedidos/{{$pedido->id}}">Visualizar</a></td>
          </tbody>
        </table>
        @empty
        <h5>Não há produtos no carrinho</h5>
        @endforelse
      </div>
    </div>
  </div>
</body>
@include('footer')
</html>
