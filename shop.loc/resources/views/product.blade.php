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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script type="text/javascript" src="{{asset('admins/js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admins/js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('admins/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admins/js/bootstrap-filestyle.min.js')}}"></script>
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
      position:absolute; 
      bottom:0; 
      width:100%; 
      height:100px; 
    }
    
  </style>
  <script>
      function addFunc(){
        var id1 = document.getElementById('id').value;
        var name1 = document.getElementById('name').value;
        var text1 = document.getElementById('text').value;
        var price1 = document.getElementById('price').value;
        var code1 = document.getElementById('code').value;
        var quantity1 = document.getElementById('quantity').value;
        var image1 = document.getElementById('image').value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

      $.ajax({

             type: 'POST',
             url: "{{route('add_basket')}}",  
              data: {
                _token: CSRF_TOKEN, 
                message:"123",
                id:id1,
                name:name1,
                text:text1,
                price:price1,
                code:code1,
                quantity:quantity1,
                image:image1,
              },
              dataType: 'JSON',
             success: function (data) {
                $(".total_qty").html(data.total_qty); 
                $(".success_add").html("Товар добавлен в корзину"); 

             }               
        });
    }

  </script>
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
          <li class="nav-item">
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
            <a href="{{route('basket')}}" class="nav-link waves-effect">
              <!-- Число товаров в корзине -->
              <span class="total_qty badge red z-depth-1 mr-1">
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

  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">
      <div class="row wow fadeInUpBig">
        <div class="col-md-6 mb-4 ">
          <img src="{{asset('assets/img/products/'.$product->image)}}" alt="" class="img-fluid">
        </div>
        <div class="p-5 col-md-6">
          <p class="lead">
            <span class="mr-1">
              {{$product->price}} KZT
            </span>
          </p>
          <p class="lead font-weight-bold">
            Описание
          </p>
          <div>
            <p>{!!$product->text!!}</p>
          </div>
          
            <div style="display: flex;">
              <input type="text" name="id" id="id" style="display: none" value="{{$product->id}}">
              <input type="text" name="code" id="code" style="display: none" value="{{$product->code}}">
              <input type="text" name="name" id="name" style="display: none" value="{{$product->name}}">
              <input type="text" name="text" id="text" style="display: none" value="{{$product->text}}">
              <input type="text" name="price" id="price" style="display: none" value="{{$product->price}}">
              <input type="text" name="image" id="image" style="display: none" value="{{$product->image}}">
              <input type="number" value = "1" min="1" id="quantity" aria-label="Search" class="form-control" style="width: 100px;" name="quantity">
              <button class="btn btn-primary btn-md my-0 p" onclick="addFunc()">
                Добавить в корзину <i class="fa fa-shopping-cart ml-1"></i>
              </button>
            </div>
            <span class="success_add badge badge-success"></span>
        </div>
      </div>
    </div>

 </main>
<!-- comments -->
<hr>

<div class="container ">
  


  <!-- add comments -->
  @if(auth()->check())
    <form method="post" action="{{ route('comment.add') }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="form-group">
       <div class="col-xs-8">
      {!! Form::textarea('comment_body', old('comment_body'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
     </div>
    </div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
  </form>
  @else
    <h5><a href="{{route('register')}}">Register</a> or <a href="{{route('login')}}">Sign In</a> to leave comment</h5>
@endif
 
<!-- comments -->
  <h4>Comments</h4>
  @include('_comment_replies', ['comments' => $product->comments, 'product_id' => $product->id])
 

<!-- comments -->


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
    CKEDITOR.replace('editor');
  </script>

</body>

</html>
