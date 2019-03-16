@extends('layouts.master')

@section('title')
Sign In
@endsection

@section('content')
<head>
    <link rel="stylesheet" href="css/login/style2.css">
    <meta charset="utf-8">
    <title>Registration</title>
</head>
<body>
<div class = "FullDiv">
    <div class = "RightDiv" >
        <div class = "InsDiv">

            @if ($message = Session::get('error'))

                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form method="post" action="{{ url('/signIn/checklogin') }}">
                    {{ csrf_field() }}

                    <h1>Sign In</h1>
            <span><i>Account Registration</i></span>
            <span><a href="{{route('product.signUp')}}"><i>Sign up here</i></a></span></br>
            <p>YOUR EMAIL</p>
            <input type="text" name="email" placeholder="your-email@example.com" >
            <p>YOUR PASSWORD</p>
            <input type="password" name="password" placeholder="Write your password"></br></br></br>
            <input type="submit" name="login" value="Sign In">
            </form>
        </div>
    </div>
</div>
</body>
@endsection