@include('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Carrinho</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="text-center">Meu pedido</h2>
        @forelse ($orders as $order)
        <h5>Pedido: {{$order->id}}</h5>
        <h5>Pedido: {{$order->created_at->format('d/m/Y H:i')}}</h5>
        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Quantidade</th>
              <th scope="col">Produto</th>
              <th scope="col">Valor Unit.</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @php
              $total = 0;
            @endphp
            @foreach ($order->pedido as $pedido)
            <tr>
              <td class="center-align">
                <div class="center-align">
                  <a href="#" onclick="carrinhoRemoverProduto(
                    {{$order->id}}, {{$pedido->product_id}}, 1)">
                  <input class="btn btn-small" type="button" id="minus" value='-'></a>
                  <span>{{$pedido->quant}}</span>
                  <a href="#" onclick="carrinhoAdicionarProduto(
                    {{$pedido->product_id}})">
                  <input class="btn btn-small" type="button" id="plus" value='+'></a>
                </div>
                  <a href="#" style="font-weight: normal" onclick="carrinhoRemoverProduto(
                    {{$order->id}}, {{$pedido->product_id}}, 0)">Remover produto</a>
              </td>
              <td>{{$pedido->produto->productName}}</td>
              <td>R$ {{$pedido->produto->price}}</td>
              @php
                $total_produto = $pedido->total;
                $total += $total_produto;
              @endphp
              <td>R$ {{ $total_produto}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
          <a class="btn" href="/produtos">Continuar comprando</a>

    </div>
      <div class="col-6">
        <div class="row">
            <h5 class="text-right">Total do pedido: R$ {{ number_format($total, 2, ',','.')}} </h5>
        </div>
        <hr>
        <div class="row">
          <form action="/carrinho/concluir" method="post">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <button type="submit" class="btn" name="button">Concluir compra</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @empty
  <h5>Não há produtos no carrinho</h5>
  @endforelse

  @if (Session::has('mensagem-sucesso'))
    <strong>{{Session::get('mensagem-sucesso')}}</strong>
  @endif
  @if (Session::has('mensagem-falha'))
    <strong>{{Session::get('mensagem-falha')}}</strong>
  @endif

<form id="form-remover-produto" action="/carrinho/remover" method="post">
  @csrf
  {{ method_field('DELETE')}}
  <input type="hidden" name="order_id">
  <input type="hidden" name="product_id">
  <input type="hidden" name="item">
</form>
<form id="form-adicionar-produto" method="post" action="/carrinho/adicionar">
  @csrf
  <input type="hidden" name="id">
</form>

@push('scripts')
  <script type="text/javascript" src="/js/carrinho.js"></script>
@endpush


<script type="text/javascript">
function carrinhoRemoverProduto (idpedido, idproduto, item){
  $('#form-remover-produto input[name="order_id"]').val(idpedido);
  $('#form-remover-produto input[name="product_id"]').val(idproduto);
  $('#form-remover-produto input[name="item"]').val(item);
  $('#form-remover-produto').submit();
}

function carrinhoAdicionarProduto (idproduto) {
  $('#form-adicionar-produto input[name="id"]').val(idproduto);
  $('#form-adicionar-produto').submit();
}
</script>


</body>

</html>
