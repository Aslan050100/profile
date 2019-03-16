<!DOCTYPE html>
<html>
<head>
	<title>MyShop</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/first/style.css') }}">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body style="background-color: #AFEEEE;">
	@include('partials.header')
<div class="container">
	@yield('content')
</div>
</body>
</html>