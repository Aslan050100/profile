<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

      <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">
      
    <style>
        .mainbody {
            background:#f0f0f0;
        }
        /* Special class on .container surrounding .navbar, used for positioning it into place. */
        .navbar-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 20;
            margin-left: -15px;
            margin-right: -15px;
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

        .navbar-content
        {
            width:320px;
            padding: 15px;
            padding-bottom:0px;
        }
        .navbar-content:before, .navbar-content:after
        {
            display: table;
            content: "";
            line-height: 0;
        }
        .navbar-nav.navbar-right:last-child {
            margin-right: 15px !important;
        }
        .navbar-footer
        {
            background-color:#DDD;
        }
        .navbar-footer-content { padding:15px 15px 15px 15px; }
        .dropdown-menu {
            padding: 0px;
            overflow: hidden;
        }

        .brand_network {
            color: #9D9D9D;
            float: left;
            position: absolute;
            left: 70px;
            top: 30px;
            font-size: smaller;
        }


        .badge-important {
            margin-top: 3px;
            margin-left: 25px;
            position: absolute;
        }

        body {
            background-color: #e8e8e8;
        }
        .search {
            background-color: white;
            background-image: url('/img/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding-left: 40px;
        }
    </style>
</head>
<div class="mainbody container-fluid">
    <div class="row">
        <div class="navbar-wrapper">
            <div class="container-fluid">
                <div class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                        class="icon-bar"></span><span class="icon-bar"></span>
                            </button>
                            
                            <a class="navbar-brand" href="/profile/auth()->user()->id">Social.loc</a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <form method="post" action="{{route('user.search')}}" enctype="multipart/form-data">
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('user.friends')}}">My Friends</a></li>
                                <li><a href="{{route('user.friends')}}"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></a></li>
                                <li><a href="{{route('user.searchFriends')}}">Search Friends</a></li>
                                <!--<li><input class="search" type = "text" name="text_search" style="margin-top: 10px;"></li>
                                <li><input type = "submit" name="search" style="margin-top: 10px;" value="Search"></li>-->
                            </ul>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                        <img src="/uploads/avatars/{{auth()->user()->avatar}}" class="img-responsive img-circle" title="John Doe" alt="John Doe" width="30px" height="30px">
                                    </span>
                                        <span class="user-name">
                                        {{auth()->user()->name}} {{auth()->user()->lastname}}
                                    </span>
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <img src="/uploads/avatars/{{auth()->user()->avatar}}" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                                                    </div>
                                                    <div class="col-md-7">
                                                        <span>{{auth()->user()->name}} {{auth()->user()->lastname}}</span>
                                                        <p class="text-muted small">
                                                            {{auth()->user()->email}}</p>
                                                        <div class="divider">
                                                        </div>
                                                        <a href="/profile/auth()->user()->id" class="btn btn-default btn-xs"><i class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
                                                        <a href="{{route('user.friends')}}" class="btn btn-default btn-xs"><i class="fa fa-address-card-o" aria-hidden="true"></i> Contacts</a>
                                                        <a href="{{route('user.settings')}}" class="btn btn-default btn-xs"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-footer">
                                                <div class="navbar-footer-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button onclick="document.getElementById('change_password').style.display='block'" class="btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="{{route('user.logout')}}" class="btn btn-default btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Sign Out</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="change_password" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-black">
                <span onclick="document.getElementById('change_password').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                <h1>Change Password</h1>
            </div>
            <div class="w3-container">
                <form action="/profile/{{auth()->user()->id}}" target="_blank" method="post">
                    {{csrf_field()}}
                    </br>
                    <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Old Password" required name="old_pass"></p>
                    <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="New Password" required name="new_pass"></p>
                    <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Repeat New Password" required name="rep_new_pass"></p>
                    <p><button class="w3-button" type="submit" style="border:1px solid black;">Change Password</button></p>
                </form>
            </div>
        </div>
    </div>
</div>
