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
          @if (count($pedido) > 0)
        <h2 class="text-center">Pedido {{$pedido[0]->order_id}}</h2>
        <h4 class="text-right">Data: {{$pedido[0]->created_at->format('d/m/Y')}}</h4>
        @php
          $total=0;
        @endphp
      @forelse ($pedido as $pedido)
        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Produto</th>
              <th scope="col">Valor</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($pedido->produto_item as $pedido_produto)
            @php
              $total_produto = $pedido->total;
              $total += $total_produto;
            @endphp
              <td>{{$pedido_produto->productName}}</td>
              <td>R$ {{$total_produto}}</td>
          </tbody>
        </table>
            @endforeach

        @empty
        <h5>Não há produtos no carrinho</h5>
        @endforelse
        <h3 class="text-right">Valor total: R$ {{$total}}</h3>
        @endif

        </div>

      </div>
    </div>

  </body>
@include('footer')

</html>
