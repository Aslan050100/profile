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
    #img-card{
        width: 100%;
        position: relative;
    }
    #img-card img{
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    footer{
      padding-top: 2%;
    }
    
  </style>
</head>

<body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
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
          <li class="nav-item ">
            <a href="{{route('products')}}" class="nav-link waves-effect">Главная</a>
          </li>
          
        
        </ul>
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

  <div id="carousel-ex" class="carousel slide carousel-fade pt-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li class="active" data-target="#carousel-ex" data-slide-to="0"></li>
        <li data-target="#carousel-ex" data-slide-to="1"></li>
        <li data-target="#carousel-ex" data-slide-to="2"></li>
      </ol>


      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
          <div class="view" style="background-image: url('https://images.pexels.com/photos/1981043/pexels-photo-1981043.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
          background-repeat: no-repeat; background-size: cover;">
            <div class="mask rgba-black-strong d-flex 
            justify-content-center align-items-center">
              <div class="text-center white-text mx-5 wow fadeIn">

                <h1 class="mb-4">
                  <strong>Web Site</strong>
                </h1>
                
                <p>
                  <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, dolorem.</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, cumque eligendi modi tempore amet sequi!</strong>
                </p>
                
                <a href="#" class="btn btn-outline-white btn-lg">
                  Lorem ipsum dolor <i class="fa fa-binoculars ml-2"></i>
                </a>

              </div>  
            </div>
          </div>
        </div>

      
        <div class="carousel-item">
          <div class="view" style="background-image: url('https://images.pexels.com/photos/847402/pexels-photo-847402.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
          background-repeat: no-repeat; background-size: cover;">
            <div class="mask rgba-black-strong d-flex 
            justify-content-center align-items-center">
              <div class="text-center white-text mx-5 wow fadeIn">

                <h1 class="mb-4">
                  <strong>1000 Мелочей</strong>
                </h1>
                
                <p>
                  <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, dolorem.</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, cumque eligendi modi tempore amet sequi!</strong>
                </p>
                
                <a href="#" class="btn btn-outline-white btn-lg">
                  Lorem ipsum dolor <i class="fa fa-binoculars ml-2"></i>
                </a>

              </div>  
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="view" style="background-image: url('https://images.pexels.com/photos/994883/pexels-photo-994883.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
          background-repeat: no-repeat; background-size: cover;">
            <div class="mask rgba-black-strong d-flex 
            justify-content-center align-items-center">
              <div class="text-center white-text mx-5 wow fadeIn">

                <h1 class="mb-4">
                  <strong>1000 Мелочей</strong>
                </h1>
                
                <p>
                  <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, dolorem.</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, cumque eligendi modi tempore amet sequi!</strong>
                </p>
                
                <a href="#" class="btn btn-outline-white btn-lg">
                  Lorem ipsum dolor <i class="fa fa-binoculars ml-2"></i>
                </a>

              </div>  
            </div>
          </div>
        </div>
      </div>

      <a href="#carousel-ex" class="carousel-control-prev" role="button"
        data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      
      <a href="#carousel-ex" class="carousel-control-next" role="button"
        data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
  </div>

  <main>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark
       mdb-color lighten-3 mt-3 mb-5">
        <span class="navbar-brand">Результаты поиска:</span>
        
        <button class="navbar-toggler" type="button" 
          data-toggle="collapse" data-target="#nextNav"
          aria-controls="nextNav" aria-expanded="false" 
          aria-label = "Toggle navigation">

          <span class="navbar-toggler-icon"></span>
        
        </button>

        <div class="collapse navbar-collapse" id="nextNav">
          <!--Категорий-->
          <ul class="navbar-nav mr-auto">
                <li class="nav-item active" >
                       <span class="navbar-brand">{{$count}}</span>
                </li>
          </ul>

          <form class="form-inline" method="post" action="{{route('search')}}">
            {{ csrf_field() }}
            <div class="md-form my-0">
              <input type="text" name="text" class="form-control mr-sm-3" placeholder="Поиск"
              aria-label>
              <button type="submit" class="btn btn-warning">Искать</button>
            </div>
          </form>

        </div>

      </nav>

      <section class="text-center mb-4">
        <div class="row wow fadeIn">

          <!-- Товар -->
          @foreach($products as $k => $product)     
          <div class="col-lg-3 col-md-6 mb-4">
            
            <div class="card">

              <div class="view overlay">
                <!--Картинка товара-->
                <div id="img-card">
                  <img class="card-img-top" style="height: 270px" 
                  src="{{asset('assets/img/products/'.$product['image'])}}" alt="Lacoste">
                  <a href="{{route('product',['code'=>$product->code])}}">
                    <div class="mask rgba-white-slight"></div>
                  </a>  
                </div>
              </div>

              <div class="card-body text-center">
                <!--Название товара-->
                <a href="{{route('products',['code'=>$product['types']])}}" class="grey-text">
                  <h5>{{$product->name}}</h5>
                </a>

                <h5>
                  <strong>
                    <a href="{{route('product',['code'=>$product->code])}}" class="dark-grey-text">{{$product->name}}</a>
                  </strong>
                </h5>
                <!-- Цена Товара -->
                <h4 class="font-weight-bold blue-text">
                  <strong>{{$product->price}} KZT</strong>
                </h4>
              </div>
            </div>
          </div>
          @endforeach

          <!--Конец товара-->
        </div>
      </section>
      
    </div>
  </main>
  
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">
    
    <div class="pt-4 py-3">
      Online Shop
    </div>
    
    
    <div class="footer-copyright py-3">
      BELO & Aidynjs
    </div>

  </footer>


  <!-- SCRIPTS -->
  <!-- JQuery -->
   <script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/mdb.js')}}"></script>
  <script>
    new WOW().init();
  </script>

</body>

</html>
