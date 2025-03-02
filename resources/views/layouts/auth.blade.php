<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Auth Page')</title>
    <link rel="apple-touch-icon" href="{{ asset('back/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/plugins/forms/switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/core/colors/palette-switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/pages/login-register.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/style.css') }}">
</head>
<body class="vertical-layout vertical-menu 1-column bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row"></div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>

    </div>

    <script src="{{ asset('back/js/vendors.min.js') }}"></script>
    <script src="{{ asset('back/js/switchery.min.js') }}"></script>
    <script src="{{ asset('back/js/switch.min.js') }}"></script>
    <script src="{{ asset('back/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('back/js/app-menu.min.js') }}"></script>
    <script src="{{ asset('back/js/app.min.js') }}"></script>
    <script src="{{ asset('back/js/form-login-register.min.js') }}"></script>
</body>
</html>