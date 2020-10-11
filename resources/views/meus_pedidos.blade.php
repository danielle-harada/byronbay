@include('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Meus pedidos</title>
</head>
<body>
  <img src="cafezinho.jpg" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-center">Meus pedidos</h2>
        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Pedido</th>
              <th scope="col">Valor</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <td>123</td>
            <td>R$19,90</td>
            <td><a href="pedidos">Visualizar</a></td>
          </tbody>
        </table>
        <a href="dados_cliente" class="btn" type="button" name="button">Voltar</a>
      </div>
    </div>
  </div>
</body>
@include('footer')
</html>
