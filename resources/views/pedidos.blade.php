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
        <h2 class="text-center">Pedido 123</h2>
        <h4 class="text-right">Data: 20/09/2020</h4>
        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Item</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Valor</th>
            </tr>
          </thead>
          <tbody>
              <td>Café bla bla bla</td>
              <td>1</td>
              <td>R$19,90</td>
          </tbody>
        </table>
        <h3 class="text-right">Valor total: $19,90</h3>
        <a href="dados_cliente" class="btn" type="button" name="button">Voltar</a>
        </div>

      </div>
    </div>

  </body>
@include('footer')

</html>