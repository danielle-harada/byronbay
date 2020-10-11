@include('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Carrinho</title>
</head>
<body>
  <img src="cafezinho.jpg" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="text-center">Meu pedido</h2>
        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
              <th scope="col">Item</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Valor</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <td>Café bla bla</td>
            <td>1</td>
            <td>R$19,90</td>
            <td><a href="#">Excluir</a></td>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <div class="row">
          <div class="col-6">
            <h4 class="text-right">Total do pedido: </h4>
          </div>
          <div class="col-6">
            <h4 class="text-left">R$ 19,90</h4>
          </div>
          <br>
        </div>
        <div class="row">
          <div class="col-6">
            <h4 class="text-right">Frete: </h4>
          </div>
          <div class="col-6">
            <h4 class="text-left">R$ 9,90</h4>
          </div>
        </div>
        <hr>
        <div class="row justify-content-center">
          <h3>Valor total: R$20,90</h3>
        </div>
        <hr>
        <h4 class="mb-3 font-weight-bold">PAGAMENTO</h4>
        <form class="" action="ped_ok" method="post">
          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Cartão Crédito</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">Cartão Débito</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Nome</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Nome completo idêntico ao cartão</small>
              <div class="invalid-feedback">
                Obrigatótio
              </div>
            </div>
            <div class="col-md-6 mb-3">
             <a><label for="cc-number">Número do cartão</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Obrigatótio
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Validade</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Obrigatótio
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Obrigatótio
              </div>
            </div>
          </div>
          <div class="row float-right">
            <button>class="nav-link" href="ped_ok" >PAGAR</a></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
 @include('footer')
</html>
