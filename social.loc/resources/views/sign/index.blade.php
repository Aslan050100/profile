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
                        <a href="{{route('user.logIn')}}" class="float-right btn btn-outline-primary mt-1">Log in</a>

                        <a href="{{route('user.guest')}}" class="float-right btn btn-outline-primary mt-1">Guest</a>
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
                        <form method="post" action="{{ route('user.addToDB') }}">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name </label>
                                    <input name="name" type="text" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" name="lastname" class="form-control" placeholder=" ">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="user@gmail.com">
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Phone number</label>
                                <input name="ph_number" type="text" class="form-control" placeholder="87089429592">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label class="form-check form-check-inline">
                                    <input  class="form-check-input" type="radio" name="genre" value="male">
                                    <span class="form-check-label"> Male </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genre" value="female">
                                    <span class="form-check-label"> Female</span>
                                </label>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Birthday</label>
                                <input name="birthday" type="text" class="form-control" placeholder="DD/MM/YYYY">
                            </div> <!-- form-group end.// -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input name="city" type="text" class="form-control">
                                </div> <!-- form-group end.// -->
                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <select name="country" id="inputState" class="form-control">
                                        <option> Choose...</option>
                                        <option selected="">Kazakhstan</option>
                                        <option>Uzbekistan</option>
                                        <option>Russia</option>
                                        <option>United States</option>
                                        <option>India</option>
                                    </select>
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row.// -->
                            <div class="form-group">
                                <label>Create password</label>
                                <input name="password" class="form-control" type="password">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Repeat password</label>
                                <input name="repeat_password" class="form-control" type="password">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block" style="background-color:#353e81;"> Register  </button>
                            </div> <!-- form-group// -->
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                        </form>
                    </article> <!-- card-body end .// -->
                    <div class="border-top card-body text-center">Have an account? <a href="{{route('user.logIn')}}">Log In</a></div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div> <!-- row.//-->


    </div>
    <!--container end.//-->
@endsection