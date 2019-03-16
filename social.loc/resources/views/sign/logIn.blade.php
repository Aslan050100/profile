@extends('layouts.saster')

@section('title')
    Social network
@endsection

@section('content')
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <style>
            body{
                background: url('http://i.imgur.com/Au8To6H.jpg') fixed;
                background-size: cover;
                padding: 0;
                margin: 0;
            }
        </style>
    </head>
    <div class="container" style="position: absolute;top:120px;right: 500px;opacity:0.9;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <a href="{{route('user.index')}}" class="float-right btn btn-outline-primary mt-1">Sign Up</a>
                        <a href="{{route('user.guest')}}" class="float-right btn btn-outline-primary mt-1">Guest</a>
                        <h4 class="card-title mt-2">Log in</h4>
                    </header>
                    <article class="card-body">
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
                        <form method="post" action="{{ route('user.checkLogin') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="user@gmail.com">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Your password</label>
                                <input name="password" class="form-control" type="password">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <button type="submit" name="login" class="btn btn-primary btn-block" style="background-color:#353e81;"> Log In  </button>
                            </div> <!-- form-group// -->
                        </form>
                    </article> <!-- card-body end .// -->
                    <div class="border-top card-body text-center">Don't have an account? <a href="{{route('user.index')}}">Sign Up</a></div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div> <!-- row.//-->


    </div>
    <!--container end.//-->
@endsection