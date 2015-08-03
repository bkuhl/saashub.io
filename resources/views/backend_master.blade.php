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
        <link rel="stylesheet" href="/admin/css/material.blue_grey-orange.min.css" type="text/css"/>
        <link rel="stylesheet" href="/admin/css/material-icons.css" type="text/css"/>
    @else
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.blue_grey-orange.min.css" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css"/>
    @endif
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    @if(Auth::check())
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <a href="/admin/dashboard"><span class="mdl-layout-title">FreeTier</span></a>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="/admin/logout">Logout</a>
            </nav>
        </div>
    </header>
    @endif

    @yield('content')

    @if(App::environment('local'))
        <script src="/admin/js/material.min.js" type="text/javascript"></script>
    @else
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js" type="text/javascript"></script>
    @endif

    @yield('scripts')
</body>
</html>