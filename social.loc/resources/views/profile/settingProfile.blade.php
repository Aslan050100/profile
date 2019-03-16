@extends('layouts.master')

@section('title')
    Social network
@endsection

@section('content')
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    </head>
    <style>
        .mainbody {
            background:#f0f0f0;
        }
        /* Flip around the padding for proper display in narrow viewports */
        .navbar-wrapper .container {
            padding-left: 0;
            padding-right: 0;
        }
        .navbar-wrapper .navbar {
            padding-left: 15px;
            padding-right: 15px;
        }

        body{
            background: url('http://i.imgur.com/Au8To6H.jpg') fixed;
            background-size: cover;
            padding: 0;
            margin: 0;
        }
    </style>
    <body>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <div class="mainbody container-fluid">
        <div class="row">
            <div style="padding-top:50px;"> </div>
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;">My basic profile</h1>
                    </div>
                </div>
                <form action = "/settings/profile/{{auth()->user()->id}}" method = "post">
                    {{csrf_field()}}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Your Name</h3>
                        <br><br>
                        <label for="First_name">First name</label>
                        <input type="text" name="name" class="form-control" id="First_name" placeholder="{{auth()->user()->name}}" value="">
                        <label for="Last_name">Last name</label>
                        <input type="text" name="lastname" class="form-control" id="Last_name" placeholder="{{auth()->user()->lastname}}" value="">
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">My extended profile</h3>
                        <br><br>
                        <p>Visibility of your extended profile:</p>
                        ...
                        <br><br>
                        <label>Your bio</label>
                        <textarea name="bio" class="form-control" rows="3"></textarea>
                        <br><br>
                        <label for="Your_location">Your City</label>
                        <input type="text" name="city" class="form-control" id="Your_location" placeholder="{{auth()->user()->city}}">
                        <br>
                        <label for="Your_email">Your Email</label>
                        <input type="email" name="email" class="form-control" id="Your_location" placeholder="{{auth()->user()->email}}">
                        <br>
                        <label for="Your_phone_number">Your Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" id="Your_location" placeholder="{{auth()->user()->ph_number}}">
                        <br>
                        <label for="Your_gender">Your gender</label>
                        <input type="text" name="gender" class="form-control" id="Your_gender" placeholder="{{auth()->user()->genre}}">
                        <br>
                        <label>Your Birthday</label>
                        <input type="text" name="birthday" class="form-control" id="birthday" placeholder="DD/MM/YYYY">
                    </div>
                </div>

                <hr>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="profile/{{auth()->user()->id}}" class="btn btn-default"><i class="fa fa-fw fa-times" ></i> Cancel</a>
                        <button type = "submit" class="btn btn-primary"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </body>
@endsection