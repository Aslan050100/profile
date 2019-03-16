@extends('layouts.master')

@section('title')
	Shopping Cart
@endsection

@section('content')
	<head>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	@if(Session::has('cart'))
		<span style="position: absolute;z-index:1;top:2%;right: 10%;border:1px solid orange;border-radius:12px;background-color: orange;color:black;width: 20px;height: 20px;text-align: center;">
				{{ $totalPiece }}</span>
		<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start" style="position:absolute;top: 4%;right: 20%;z-index: 1;">
			<ul class="nav navbar-nav navbar-right ml-auto">
				<li class="nav-item dropdown">
					@if(auth()->check())
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
							{{auth()->user()->name}}
							<b class="caret"></b></a>
					@endif

				</li>
			</ul>
		</div>
		@if($totalPiece>0)
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-10 col-md-offset-1">
					<table class="table table-hover">
						<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th class="text-center">Price</th>
							<th class="text-center">Total</th>
							<th> Actions </th>
						</tr>
						</thead>
						<tbody>
						<tr>
							@foreach($products as $product)
							<td class="col-sm-8 col-md-6">
								<div class="media">
									<a class="thumbnail pull-left" href="#"> <img class="media-object" src="img/{{$product['item']['icon']}}" style="width: 72px; height: 72px;"> </a>
									<div class="media-body">
										<h4 class="media-heading"><a href="#">{{$product['item']['name']}}</a></h4>
										<h5 class="media-heading"> by <a href="#">{{$product['item']['name']}}</a></h5>
									</div>
								</div></td>
							<td class="col-sm-1 col-md-1" style="text-align: center">
								<input type="email" class="form-control" id="exampleInputEmail1" value="{{$product['qty']}}">
							</td>
							<td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']['price']}} tg</strong></td>
							<td class="col-sm-1 col-md-1 text-center"><strong>{{$product['qty'] * $product['item']['price']}} tg</strong></td>
							<td class="col-sm-1 col-md-1">
								<a href="{{ route('product.reduceByOne', ['id'=>$product['item']['id']])}}"><button type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"></span> Remove
								</button></a></td>
							<td class="col-sm-1 col-md-1">
								<a href="{{ route('product.remove', ['id'=>$product['item']['id']])}}"><button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove"></span> Remove all
									</button></a></td>
						</tr>
						@endforeach
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h5>Subtotal</h5></td>
							<td class="text-right"><h5><strong>{{ $totalPrice }} tg</strong></h5></td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h5>Estimated shipping</h5></td>
							<td class="text-right"><h5><strong>1000 tg</strong></h5></td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h3>Total</h3></td>
							<td class="text-right"><h3><strong>{{ $totalPrice + 1000 }} tg</strong></h3></td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<a href="{{route('product.index')}}"><button type="button" class="btn btn-default">
									<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
								</button></a></td>
							<td>
								<a href="{{ route('checkout')}}"><button type="button" class="btn btn-success">
									Checkout <span class="glyphicon glyphicon-play"></span>
								</button></a></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif


	@endif
@endsection