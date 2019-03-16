<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('assets/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <style>
    html,
    body,
    header,
    .carousel{
      height: 60vh;
    }
    @media(max-width: 740px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }
    @media(min-width: 800px) and (max-width: 850px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }
    footer{
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>

<body>

  <nav class="navbar sticky-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">
      <a href="#" class="navbar-brand waves-effect">
        <strong class="blue-text">1000Melochey</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label = "Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('products')}}" class="nav-link waves-effect">Главная</a>
          </li>
         
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
           <li class="nav-item active">
            <a href="#" class="nav-link waves-effect active">Оформление заказа</a>
          </li>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="{{route('basket')}}" class="nav-link waves-effect">
              <!-- Число товаров в корзине -->
              <span class="badge red z-depth-1 mr-1">
                {{$total_qty}}
              </span>
              <i class="fa fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block">Cart</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link border border-light rounded waves-effect">      
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  



    <hr class="my-4 d-md-block" style="border: 0px;">  

  <div class="container">
    
    <!-- Extended default form grid -->
    <form method="post" action="{{route('send')}}">
      {{csrf_field()}}
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputName">Имя</label>
      <input type="text" class="form-control" id="inputName" placeholder="Имя" name="name">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputSurname">Фамилия</label>
      <input type="text" class="form-control" id="inputSurname" placeholder="Фамилия" name="surname">
    </div>
  </div>
  <!-- Grid row -->
  

  <!-- Default input -->
  <div class="form-group">
    <label for="inputAddress">Адрес</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Адрес" name="address">
  </div>
  <!-- Default input -->
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputTelephone">Телефон</label>
      <input type="text" class="form-control" id="inputTelephone" placeholder="87771112233" name="mobile">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail">Почта</label>
      <input type="email" class="form-control" id="inputEmail" placeholder="Почта" name="email">
    </div>
  </div>
  <!-- Grid row -->
  <button type="submit" class="btn btn-success btn-md ">Заказать</button>
</form>
<!-- Extended default form grid -->
  </div>

      

  <footer class="page-footer text-center font-small mt-4 wow fadeIn" >
    
    <div style="height: 50px">
        <div class="pt-4 py-3" >
          <p style="margin-top: -7px;">Online Shop</p>
        </div>
    </div>
    
    
    
    <div class="footer-copyright py-3">
      BELO & Aidynjs
    </div>

  </footer>


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/mdb.js')}}"></script>

  <script>
    new WOW().init();
  </script>

</body>

</html>
