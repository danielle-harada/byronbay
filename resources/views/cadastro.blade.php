@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Cadastro</title>
</head>
<body>
  <div class="container">
    <h3 class="mt-5 text-center">ESCOLHA O TIPO DE CONTA</h3>
    <br>
    <div class="row justify-content-center mt-1">
      <div class="col-5">
        <a href="clientes/cadastro">
          <img src="comprador.jpg" alt="" width="100%" height="300w"></a>
          <h3 class="text-center">QUERO COMPRAR CAFÉ</h3>
        </div>
        <div class="col-5">
          <a href="produtores/cadastro">
            <img src="produtor.jpg" alt="" width="100%" height="300w"></a>
            <h3 class="text-center">PRODUTOR DE CAFÉ</h3>
          </div>
        </div>
      </div>
    </body>
     @include('footer')
    </html>
