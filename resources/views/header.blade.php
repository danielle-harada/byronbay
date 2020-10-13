<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title></title>
</head>
<body>
  <header>
    <div class="container">
      <nav class="navbar nav-expand-lg">
        <ul class="nav">
          <li class="nav-item">

            <a class="nav-link active" href= "/home"><img src="{{asset('logo.png')}}" alt="logo" width="200w"></a>
          </li>
        </ul>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link"  href="/produtos" style="color: white; font-weight: bold">PRODUTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/produtores" style="color: white; font-weight: bold">PRODUTORES</a>
          </li>
        </ul>
        <ul class="nav justify-content-end">
          <li class="nav-item ">
            <a href="../carrinho" class="navbar-nav pl-2 pr-2 mx-1">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-basket-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
              </svg>
            </a>
          </li>

          <li class="nav-item">
            @guest
            <a href="/login" class="navbar-nav pl-2 pr-2 mx-1">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
              </svg>
            </a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('CADASTRE-SE') }}</a> -->
            <a class="nav-link font-weight-bold" href="/cadastro" style="color:white">{{ __('CADASTRE-SE') }}</a>
          </li>
          @endif

          @else
          <li class="nav-item">
            <a class="nav-link" href="/dados/{{Auth::id()}}" style="color:white">Olá, {{ Auth::user()->name }}!</a>
          </li>



          <li class="nav-item">
            <a class="nav-link" style="color:white" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('LOGOUT') }}</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a id="dropdownMenuButton" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a> -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </nav>
  </div>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html
