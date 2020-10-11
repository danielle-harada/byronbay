@include ('header')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar produto</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="text-center">Editar produto</h2>
        <hr>
        <form action="/produtos/editar/{{$produto->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Nome do Produto</label>
            <input type="text" class="form-control" name="productName" value="{{$produto->productName}}">
          </div>
          <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" name="description" rows="5">{{$produto->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="weight">Peso (em gramas)</label>
            <input type="number" class="form-control" name="weight" value="{{$produto->weight}}">
          </div>
          <div class="form-group">
            <label for="grain">Tipo</label>
            <select class="form-control" name="grain" value="{{$produto->grain}}">
              <option value="Grãos">Grãos</option>
              <option value="Moído">Moído</option>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Preço</label>
            <input class="form-control" type="number" name="price" min="0" step=".01" value="{{$produto->price}}">
          </div>
          <div class="form-group">
            <label for="photo">Imagem</label>
            <input type="file" class="form-control-file" name="photo" value="{{($produto->photo)}}">
            <img src="{{asset($produto->photo)}}" alt="">
          </div>
          <button type="submit" class="btn btn-lg btn-block" name="button">Salvar</button>
        </form>
        <a href="/meus_produtos" class="btn" type="button" name="button">Voltar</a>
      </div>
    </div>
  </div>

</body>
@include ('footer')
</html>
