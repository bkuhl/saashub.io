<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    @yield('meta')

    @if(App::environment('local'))
        <link rel="stylesheet" href="/css/lato.css">
    @else
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
    @endif

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/colour.css" rel="stylesheet" type="text/css"/>
    <link href="/css/prettyPhoto.css" rel="stylesheet" type="text/css"/>
    <link href="/css/zocial.css" rel="stylesheet" type="text/css"/>

    <!--[if IE]>
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
        .categories {
            text-align: left;
        }
        .categories h3 {
            margin-top: 0;
            text-align: center;
        }
        .categories li.active {

        }
        h1.category-title {
            margin-top: 6px;
            font-size: 30px;
            font-weight: 700;
        }
        .service-card img {
            height: 100px;
            width: 100px;
        }
        .categories ul {
            list-style-type: none;
            padding-left: 0;
        }
        .categories li a {
            display: block;
            padding: 4px 8px;
        }
        .categories li a:hover {
            background-color: #7C899A;
            color: #fff;
        }
        .categories li.active {
            font-weight: bold;
        }
        .service-card > .description {
            height: 105px;
        }
    </style>
</head>
<body>
    <!--header-->
    <div class="header">
        <nav id="main_menu" class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!--toggle-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!--logo-->
                    <div class="logo">
                        <a href="/">
                            @if(App::environment('production'))
                                <img src="http://assets.saashub.io/logo.png" />
                            @else
                                <img src="/img/logo.png" />
                            @endif
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav pull-right">
                        <li
                                @if(strstr(Route::current()->getUri(), 'browse'))
                                class="active"
                                @endif
                                ><a href="/browse">Browse</a></li>
                        <li
                            @if(Route::current()->getUri() == 'contact')
                                class="active"
                            @endif
                        ><a href="/contact">Recommend a service</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--//header-->

    @yield('content')

    <!-- footer-->
    <div id="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        SaaSHub
                        &copy;
                        {{ \Carbon\Carbon::now()->format('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- up to top -->
    <a href="#"><i class="go-top fa fa-angle-double-up"></i></a>
    <!--//end-->

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.touchSwipe.min.js"></script>
    <script src="/js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    @yield('includeJs')
    <script type="text/javascript">
        @yield('js')
    </script>
</body>
</html>