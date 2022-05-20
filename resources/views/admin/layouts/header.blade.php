
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('landingAssets/img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/toggle/switchery.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/chartist.css')}}">
    {{--    Time Picker--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/default.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/default.date.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/default.time.css')}}">--}}

    {{--    for date--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/daterange/daterangepicker-new.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/default.date.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/default.time.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/pickers/daterange/daterange.css')}}">
    {{--    for date--}}

    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/timeline/vertical-timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/selects/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/extensions/rowReorder.dataTables.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/extensions/responsive.dataTables.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/ui/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/toastr.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/dashboard-analytics.css')}}">--}}
<!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/extensions/toastr.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/line-awesome/css/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/checkboxes-radios.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/cropper.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/users.min.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/timeline.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/dashboard-ecommerce.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/animate/animate.min.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/advanced-cards.min.css')}}">--}}

<!-- END: Page CSS-->
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/laravel-datatable.css')}}">--}}
<!-- DATATABLE: ended-->
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/dashboard-analytics.css')}}">--}}

    {{--    new time picker--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.timepicker.css')}}">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

    {{--   bootstrap toggle button --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-toggle.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/rangeslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/tags/tagging.min.css')}}">
    @stack('custom-css')
    <style type="text/css">
        @font-face {
            font-family: "Open Sans";
            src: url("{{asset('assets/fonts/Open_Sans/OpenSans-SemiBold.ttf')}}");
            font-display: swap;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
