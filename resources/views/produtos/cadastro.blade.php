@include ('header')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro de produtos</title>
  </head>
  <body>
<img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
        <h2 class="text-center">Cadastro de produtos</h2>
        <hr>
        <form action="/produtos/cadastro/{{Auth::id()}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Nome do Produto</label>
            <input type="text" class="form-control" name="productName">
          </div>
          <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" name="description" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="weight">Peso (em gramas)</label>
            <input type="number" class="form-control" name="weight">
          </div>
          <div class="form-group">
            <label for="grain">Tipo</label>
            <select class="form-control" name="grain">
              <option value="Grãos">Grãos</option>
              <option value="Moído">Moído</option>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Preço</label>
            <input class="form-control" type="number" name="price" min="0" step=".01">
          </div>
          <div class="form-group">
              <label for="photo">Imagem</label>
              <input type="file" class="form-control-file" name="photo">
          </div>
            <button type="submit" class="btn btn-lg btn-block" name="button">Cadastrar</button>
            </form>
          </div>
        </div>
    </div>

    <!-- MENSAGEM DE ERRO DAS VALIDAÇÕES -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif


</body>
@include ('footer')
</html>
