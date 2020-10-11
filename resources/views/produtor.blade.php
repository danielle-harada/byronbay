@include('header')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Produtor</title>
</head>
<body>
  <img src="{{asset('cafezinho.jpg')}}" alt="padrao" width="100%" height="110w">
  <div class="container">
    <div class="row mt-5">
      <div class="col-5">
        <img src="{{asset($produtor->photo)}}" alt="cafe1" width="100%" height="300w">
      </div>
      <div class="col-7">
        <h3>{{$produtor->brandName}}</h3>
        <hr>
        <h5>{{$produtor->city}}/{{$produtor->state}}</h5>
        <br>
        <p class="text-justify">{{$produtor->description}}</p>
        <br>
        <a class="float-right font-weight-bold" href="/produtos/{{$produtor->user_id}}" style="color:black">Ver produtos</a>
      </div>
    </div>
  </div>
</body>
 @include('footer')
</html>
