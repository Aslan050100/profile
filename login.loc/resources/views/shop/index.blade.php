@extends('layouts.master')

@section('title')
	Shopping Cart
@endsection

@section('content')
	<head>
		<script src="js/aibol.js" defer></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			.nav-link img {
				border-radius: 50%;
				width: 36px;
				height: 36px;
				margin: -8px 0;
				float: left;
				margin-right: 10px;
			}
			.navbar .navbar-brand {
				color: #555;
				padding-left: 0;
				padding-right: 50px;
				font-family: 'Merienda One', sans-serif;
			}
			.navbar .navbar-brand i {
				font-size: 20px;
				margin-right: 5px;
			}
		</style>
	</head>
	<div class="content" style="margin-top: 50px;margin-left: -70px;">
		<span style="position: absolute;z-index:1;top:2%;right: 10%;border:1px solid orange;border-radius:12px;background-color: orange;color:black;width: 20px;height: 20px;text-align: center;">
				{{$totalPiece}}</span>
		@foreach($products->chunk(3) as $productChuck)
			<div class="card" >
				@foreach($productChuck as $product)
					<div style="-moz-border-radius: 20px;
    -khtml-border-radius: 20px;
    -webkit-border-radius: 20px;
    border-radius: 20px;
    overflow:hidden;
    background:#F6E7B9;
    -webkit-box-shadow:0 0 4em rgb(4,6,5);
    -moz-box-shadow:0 0 3em rgb(6,7,8);
    box-shadow:0 0 1em rgb(5,9,2);
    border:20px solid skyblue;
    font-family:Verdana, Geneva, sans-serif; ">
					<div class="photo" style="padding-top: 15px;">
						<img src="img/{{$product->icon}}" alt="img">
					</div>
					<div class="name">{{$product->name}}</div>
					<div class="price">{{$product->price}} tg</div>
						<div class="add" style="width: 30px;border-radius: 24px;">
							@if(auth()->check())
							<a href="{{ route('product.addToCart', ['id'=> $product->id])}}" id = "toBasket">
								@endif
								<img style="width: 20px;height: 20px;" src="img/cart2.png"></a>

						</div>
						</div>
				@endforeach

			</div>

		@endforeach
		<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start" style="position:absolute;top: 4%;right: 20%;z-index: 1;">
			<ul class="nav navbar-nav navbar-right ml-auto">
				<li class="nav-item dropdown">
					@if(auth()->check())
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
							{{auth()->user()->name}}
							<b class="caret"></b></a>
					@endif
					<ul class="dropdown-menu">
						<li><a href="/profile/auth()->user()->id" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></li>
						<li class="divider dropdown-divider"></li>
						<li><a href="{{route('product.logout')}}" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>

		
	<!--
		<div class="info close" id= "info">
		<div class="hoverme"><img src="img/{{$product->icon}}" alt="img" id = "hoveredImg"></div>
			<div class="infoContent">
				<div class="name_info">{{$product->name}}</div>
				<div class="price_info">{{$product->price}} tg</div>
				<div class="text_info"><p id = text>{{ $product->text }}</p></div>
				<div class="add_info"><a href="{{ route('product.addToCart', ['id'=> $product->id])}}" id = "toBasket">Add to cart</a></div>
			</div>
		</div>
-->
@endsection