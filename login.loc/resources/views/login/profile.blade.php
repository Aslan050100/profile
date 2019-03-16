@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    <head xmlns="">
    <!DOCTYPE html>
    <html>
        <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
            .container{
                margin-top: 1%; 
            }
            .buttons{
                width: 100%;
                margin: 5%;
                justify-content: space-between;
            }
            #goOut{
                margin-left: 50%;
            }
            .notactive{
                display: none;
            }
            .active{
                display: block;
            }

        </style>
        </head>
    <body>

            <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >User Profile</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2>{{auth()->user()->name}}</h2>
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span>{{auth()->user()->name}}</p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>{{auth()->user()->email}}</p></li>
                          </ul>
                          <hr>
                          <br/>
                          <div class = "buttons">
                              <a href="{{route('product.index')}}"><button class = "btn btn-success" id = "goShop">Shop</button></a>
                              <a><button class = "btn btn-info" id = "goSettings" >Settings</button></a>
                              <a href="{{route('product.logout')}}"><button class = "btn btn-danger" id = "goOut">Log Out</button></a>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-horizontal notactive">
                    <fieldset>
                        <form action = "/profile/{{auth()->user()->id}}" method = "post">
                                {{csrf_field()}}
                        <legend>Change Password</legend>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piCurrPass">Old Password</label>
                    <div class="col-md-4">
                        <input id="piCurrPass" name="piCurrPass" type="password" placeholder="" class="form-control input-md" required="">
                    </div>
                    </div>
                
                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piNewPass">New Password</label>
                    <div class="col-md-4">
                        <input id="piNewPass" name="password" type="password" placeholder="" class="form-control input-md" required="">
                        
                    </div>
                    </div>
                
                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piNewPassRepeat">Confirm password</label>
                    <div class="col-md-4">
                        <input id="piNewPassRepeat" name="piNewPassRepeat" type="password" placeholder="" class="form-control input-md" required="">
                        
                    </div>
                    </div>
                    <!-- Change Name -->
                    <legend>Change Name</legend>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piName">Full Name</label>
                    <div class="col-md-4">
                        <input id="piCurrPass" name="name" type="text" placeholder="" class="form-control input-md" required="" value ="{{auth()->user()->name}}">
                    </div>
                    </div>
                
                    <!-- Change Email -->
                    <legend>Change Email</legend>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piEmail">Email</label>
                    <div class="col-md-4">
                        <input id="piCurrPass" name="email" type="text" placeholder="" class="form-control input-md" required="" value = "bilgates@gmail.com">
                    </div>
                    </div>

                
                    <legend></legend>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bCancel"></label>
                    <div class="col-md-8">
                        <button id="bCancel" name="bCancel" class="btn btn-danger">Cancel</button>
                        <button id="bChange" name="bChange" class="btn btn-success" type = "submit">Change</button>
                    </div>
                    </div>
                        </form>
                    </fieldset>
                </div> </div>
            <script>
                document.querySelector("#goSettings").onclick = function (){
                    if(document.querySelector(".form-horizontal").classList.contains("notactive")){
                        document.querySelector(".form-horizontal").classList.remove("notactive");
                        document.querySelector(".form-horizontal").classList.add("active");
                    }
                    else{
                        document.querySelector(".form-horizontal").classList.remove("active");
                        document.querySelector(".form-horizontal").classList.add("notactive");
                    }
                }   
            </script>

    </body>
</html>
@endsection