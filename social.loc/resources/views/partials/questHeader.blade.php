<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
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
                            <a class="navbar-brand" href="./ORqmj" style="margin-right:-8px; margin-top:-5px;">
                                <img alt="Brand" src="https://lut.im/7trApsDX08/GeilMRp1FIm4f2p7.png" width="30px" height="30px">
                            </a>
                            <a class="navbar-brand" href="./ORqmj">Project*</a>
                            <i class="brand_network"><small><small>diaspora* Network</small></small></i>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav" style="padding-left: 1100px;">
                                <li><a href="{{route('user.logIn')}}">Sign In</a></li>
                                <li><a href="{{route('user.index')}}">Sign Up</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
