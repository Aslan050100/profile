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
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
    
  </style>
  <script>
   function deleteFunc($id){
     
      $.ajax({
             type: 'GET',
             url: "basket/delete/"+ $id,  
             data: "",

             success: function (data) {
                
                 document.getElementById("row_"+data.id).style.display = "none"; 
                  $(".total_qty").html(data.total_qty); 
                  $(".total").html("Общая сумма: "+ data.total); 

             }               
        });
     
    }
    function changeQuantity($id2){
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id1 = $id2;
        var q = document.getElementById('quantity_'+$id2).value;
     
          $.ajax({

             type: 'POST',
             url: "{{route('update_basket')}}",  
              data: {
                _token: CSRF_TOKEN, 
                message:"123",
                id:id1,
                quantity:q,
              },
              dataType: 'JSON',
             success: function (data) {

                  var id = data.id;
                  var quantity = data.cart['quantity'];
                  var price = data.cart['price'];
                  var t_q = data.t_q;

                  document.getElementById("total_"+id).innerHTML = quantity * price + " KZT";
                  document.getElementById("total_qty").innerHTML = t_q;
                  
             }               
        });
    }
  </script>
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
         
          <li class="nav-item active">
            <a href="#" class="nav-link waves-effect">Корзина</a>
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
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="#" class="nav-link waves-effect">
              <!-- Число товаров в корзине -->
              <span class="total_qty badge red z-depth-1 mr-1" id="total_qty">
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
        <div class="table-responsive">
          <table class="table table-striped " id = "tablet">
            <thead>
              <tr>
                <th></th>
                <th>Название товара</th>
                <th><span style="text-align: left;">Количество</span></th>
                <th>Цена за ед.</th>
                <th>Общая цена</th>
                <th>Удалить</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $k=>$product)
              
              <tr id="row_{{$product->id}}" >
                <th>
                  <div id="img-card" class="view rounded">
                    <a href="{{route('product',['code'=>$product['attributes']->code])}}"> <img  src="{{asset('assets/img/products/'.$product['attributes']->image)}}" class = "card-img-top"alt="Lacoste" alt="" style="width: 150px; height: 150px;">   

                  </div>
                  </th>
                <th>

                 <a href="{{route('product',['code'=>$product['attributes']->code])}}"> <p style="font-size: 20px;font-family: 'Montserrat', sans-serif;">{{$product->name}}</p> </a>
                  
                </th>
                <th>
                  
                  <input type="number" value = "{{$product->quantity}}" min="1" id="quantity_{{$product->id}}" aria-label="Search" class="form-control" style="width: 100px;" name="quantity" onchange="changeQuantity({{$product->id}})">
                </th>
                <th>
                  <p id="price_{{$product->id}}" style="font-size: 20px;font-family: 'Montserrat', sans-serif;">{{$product->price}}KZT</p>
                </th>
                <th>
                  <p id="total_{{$product->id}}" style="font-size: 20px;font-family: 'Montserrat', sans-serif;">{{$product->price * $product->quantity}}KZT</p>
                </th>
                <th>
                  <a href="#" onclick="deleteFunc({{$product->id}})"> <i class="fas fa-trash"></i></a> 
                </th>
              </tr>
              @endforeach
            </tbody>
        </table>  
        </div>  
        <hr>
  <div class="container">
    <h5 class="total" style="text-align: right;">Общая сумма: {{$total}}</h5>
    <a href="{{route('empty_basket')}}"><button type="button" class="btn btn-danger">Очистить</button></a>
    <a href="{{route('fill')}}"><button type="button" class="btn btn-success" style="float: right;">Заказать</button></a>
  

  </div>
  
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
