@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nossos produtores</title>
  </head>
  <body>
    <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
    <div class="container">
      <h2 class="text-center">NOSSOS PRODUTORES</h2>
      <hr>
      <div class="row">
        @foreach ($produtores as $produtor)
        <div class="col-4">
          <a href="/produtor/{{$produtor->id}}">
          <img class="rounded mx-auto d-block" src="{{asset($produtor->photo)}}" alt="" width="90%" height="220w"></a>
          <h4 class="text-center">{{$produtor->brandName}}</h4>
        </div>
        @endforeach
      </div>
    </div>
    {{$produtores->links("pagination::bootstrap-4")}}
  </body>
  @include('footer')
</html>
