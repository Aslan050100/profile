@extends('layouts.master')

@section('title')
    Social network
@endsection

@section('content')

    <!--
    <h1>{{auth()->user()->name}}</h1>

    <a href="{{route('user.logout')}}"><button type="button" name="logout" style="background-color:#353e81;"> Log Out  </button></a>
    -->
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .mainbody {
                background:#f0f0f0;
            }
            .navbar-wrapper .container {
                padding-left: 0;
                padding-right: 0;
            }
            .navbar-wrapper .navbar {
                padding-left: 15px;
                padding-right: 15px;
            }

            .post-content {
                margin-left:58px;
            }

            body{
                background: url('http://i.imgur.com/Au8To6H.jpg') fixed;
                background-size: cover;
                padding: 0;
                margin: 0;
            }
        </style>
    </head>
    <body>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
    <div class="mainbody container-fluid" >
        <div class="row">
            <div style="padding-top:50px;"> </div>
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div align="center">
                                <img class="thumbnail img-responsive" src="/uploads/avatars/{{auth()->user()->avatar}}" width="300px" height="300px">
                            </div>
                            <div class="media-body">
                                <hr>
                                <h3><strong>Bio</strong></h3>
                                <p>{{auth()->user()->bio}}</p>
                                <hr>
                                <h3><strong>Location</strong></h3>
                                <p>{{auth()->user()->country}}, {{auth()->user()->city}}</p>
                                <hr>
                                <h3><strong>Gender</strong></h3>
                                <p>{{auth()->user()->genre}}</p>
                                <hr>
                                <h3><strong>Birthday</strong></h3>
                                <p>{{auth()->user()->birthday}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px;">{{auth()->user()->name}} {{auth()->user()->lastname}}<small> {{auth()->user()->email}}</small> <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i></h1>
                        <div class="dropdown pull-right">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Familly</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Friends</a></li>
                                <li><a href="#">Work</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add a new aspect</a></li>
                            </ul>
                        </div>
                    </span>
                        <br><br>
                        <form enctype="multipart/form-data" action="/updateAvatar/profile/{{auth()->user()->id}}" method = "post">
                            <label>Update Profile Image</label>
                            <input type ="file" name = "avatar">
                            <input type ="hidden" name = "_token" value="{{ csrf_token() }}" >
                            <input type ="submit" class="pull-right btn btn-sm btn-primary" value="Submit">
                        </form>
                        <br><br><hr>

                <div class="w3-container   w3-large" id="menu" style="margin-left: 5%;margin-right: 5%">
                    <div class="w3-content">
                        <div class="w3-row w3-center  w3-border-dark-grey">
                            <a href="javascript:void(0)" onclick="openMenu(event, 'Posts');" id="myLink">
                                <div class="w3-col s3 tablink w3-padding-large w3-hover-red">My Posts</div>
                            </a>

                            <a href="javascript:void(0)" onclick="openMenu(event, 'Photos');">
                                <div class="w3-col s3 tablink w3-padding-large w3-hover-red">My Photos</div>
                            </a>
                            <a href="javascript:void(0)" onclick="openMenu(event, 'add_post');">
                                <div class="w3-col s3 tablink w3-padding-large w3-hover-red">Add new post</div>
                            </a>
                        </div>
                        <div id="Posts" class="w3-container menu w3-padding-32">
                            <!-- Sample post content with picture. -->
                            @foreach($my_posts as $k=>$my_post)
                            <div class="panel panel-default" id = "with_pictures">
                                <div class="panel-body">
                                    <div class="pull-left">
                                        <a href="#">
                                            <img class="media-object img-circle" src="/uploads/avatars/{{auth()->user()->avatar}}" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                                        </a>
                                    </div>
                                    <h4><a href="#" style="text-decoration:none;"><strong>{{auth()->user()->name}}</strong> <strong>{{auth()->user()->lastname}}</strong> </a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 42 minutes ago</i></a></small></small></h4>
                                    <span>
                            <div class="navbar-right">
                                <div class="dropdown">
                                    <button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dd1" style="float: right;">
                                        
                                        <li><a href="/delete_post/{{$my_post->id}}"><i class="fa fa-fw fa-trash" aria-hidden="true"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                            <hr>
                            <div class="post-content">
                                <p>{{$my_post->text}}</p>
                                <img class="img-responsive" src="/assets/img/{{$my_post->img}}">
                            </div>
                            <hr>
                            <div>
                                <div class="pull-right btn-group-xs">
                                    <a class="btn btn-default btn-xs"><i class="fa fa-heart" aria-hidden="true"></i> Like</a>
                                    <a class="btn btn-default btn-xs"><i class="fa fa-retweet" aria-hidden="true"></i> Reshare</a>
                                    <a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Comment</a>
                                </div>
                                <br>
                            </div>
                            <hr>
                            <div class="media">
                                <div class="media-body">
                                        <div class="post-content">
                                            <div class="panel-default">
                                                <div class="panel-body">
                                                    <div class="pull-left">
                                                        <a href="#">
                                                            <img class="media-object img-circle" src="https://diaspote.org/uploads/images/thumb_large_283df6397c4db3fe0344.png" width="35px" height="35px" style="margin-right:8px; margin-top:-5px;">
                                                        </a>
                                                    </div>
                                                    <h4><a href="#" style="text-decoration:none;"><strong>Aslan Aitkulov</strong></a></h4>
                                                    <hr>
                                                    <div class="post-content">
                                                        Beautiful<br><br>
                                                      Good job!!!
                                                        <br><small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 12 minutes ago</i></a></small></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="media">
                                        <div class="pull-left">
                                            <a href="#">
                                                <img class="media-object img-circle" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <textarea class="form-control" rows="1" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                                @endforeach
                            </div>
                <div id="Photos" class="w3-container menu w3-padding-32">
                    <div class="w3-row">
                        @foreach($my_posts as $k=>$my_post)
                        <div class="w3-third">
                            <img src="/assets/img/{{$my_post->img}}" style="width:100%" onclick="onClick(this)" alt="A boy surrounded by beautiful nature">
                        </div>
                            @endforeach
                    </div>

                </div>
                <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
                    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
                    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
                        <img id="img01" class="w3-image">
                        <p id="caption"></p>
                    </div>
                </div>
                <div id="add_post" class="w3-container menu w3-padding-32">
                    <form action="/add_new_post/profile/{{auth()->user()->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label>Text</label>
                    </br>
                        <textarea placeholder="Write content" style="width: 600px;height: 100px;" name = "text"></textarea>
                        <input type ="file" name = "images">
                        <input type ="hidden" name = "_token" value="{{ csrf_token() }}">
                        <input type ="submit" class="pull-right btn btn-sm btn-primary" value="Submit">
                    </form>
                </div>
                    <!--<div id="add_photo" class="w3-container menu w3-padding-32">
                        <form action="/add_new_photo/profile/{{auth()->user()->id}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label>Text</label>
                            <textarea placeholder="Write content" style="width: 400px;height: 100px;" name = "text"></textarea>
                            <input type ="file" name = "images">
                            <input type ="hidden" name = "_token" value="{{ csrf_token() }}">
                            <input type ="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                    </div>-->
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        //Photos
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }
        // Tabbed Menu
        function openMenu(evt, menuName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("menu");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(menuName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-red";
        }
        document.getElementById("myLink").click();


    </script>
    </body>

@endsection