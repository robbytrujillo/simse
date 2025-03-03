<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" c>
    <meta http-equiv="X-UA-Compatible" c>
    <meta name="viewport" c>
    <title>@yield('title', 'Dashboard')</title>
    <meta name="csrf-token" c>
    <link rel="apple-touch-icon" href="{{ asset('back/images/apple-icon-120.png') }}">
    {{--  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('back/images/favicon.ico') }}">  --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('back/images/logo/ihbs-logo.png') }}">
  
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/palette-switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/toastr.css') }}">

    <link rel="stylesheet" href="{{ asset('stisla/dist/assets/modules/summernote/summernote-bs4.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/components.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/chat-application.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/dashboard-analytics.min.css') }}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/toastr.min.css') }}">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/style.css') }}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
    @include('partials.dashboardNavbar')
    @include('partials.dashboardSidebar')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
                @yield('content')
                <!--/ Total earning & Recent Sales  -->
            </div>
        </div>
    </div>

    @include('partials.dashboardFooter')
    @include('partials.greetings')

    <!-- BEGIN: Vendor JS-->
    <!-- BEGIN: Vendor JS-->

    <script src="{{ asset('back/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/switch.min.js') }}" type="text/javascript"></script>
    <!-- END: Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('back/js/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/chartist-plugin-tooltip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/modules/summernote/summernote-bs4.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{ asset('back/js/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/select2.full.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('back/js/app-menu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/customizer.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/jquery.sharrre.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/sweetalert2.all.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/vendors/toastr.min.js') }}" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('back/js/dashboard-analytics.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('back/js/datatable-basic.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/form-select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/sweet-alerts.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/js/toastr.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->

    <!-- END: Custom JS-->
    <script>
        @if(session('type') == 'sweetalert')
        @if(session('success'))
        swal("Good job!", "{{ session('success') }}", "success");
        @endif

        @if(session('error'))
        swal("Oops!", "{{ session('error') }}", "error");
        @endif
        @elseif(session('type') == 'toastr')
        @if(session('success'))
        toastr.info("{{ session('success') }}", "Success", {
            positionClass: "toast-bottom-right"
        });
        @endif

        @if(session('error'))
        toastr.error("{{ session('error') }}", "Error", {
            positionClass: "toast-bottom-right"
        });
        @endif
        @endif
    </script>

    @stack('modal')
    @stack('js')
</body>
<!-- END: Body-->

</html>
