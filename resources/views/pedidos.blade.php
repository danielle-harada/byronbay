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
      @forelse ($pedido as $pedido)
        <h2 class="text-center">Pedido {{$pedido->order_id}}</h2>
        <h4 class="text-right">Data: {{$pedido->created_at->format('d/m/Y')}}</h4>

        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Produto</th>
              <th scope="col">Valor</th>
            </tr>
          </thead>
          <tbody>
            @php
              $total=0;
            @endphp
            @foreach ($pedido->produto_item as $pedido_produto)
            @php
              $total_produto = $pedido->total;
              $total += $total_produto;
            @endphp
              <td>{{$pedido_produto->productName}}</td>
              <td>R$ {{$total_produto}}</td>
          </tbody>
        </table>
        <h3 class="text-right">Valor total: R$ {{$total}}</h3>
            @endforeach
        @empty
        <h5>Não há produtos no carrinho</h5>
        @endforelse
        </div>

      </div>
    </div>

  </body>
@include('footer')

</html>
