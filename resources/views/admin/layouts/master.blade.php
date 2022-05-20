<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.layouts.header')

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
      data-color="bg-gradient-x-blue-cyan" class="bg-gradient" data-col="2-columns">

    @include('admin.layouts.navbars.top')
    @include('admin.layouts.navbars.sidebar')

    @yield('content')

    @include('admin.layouts.footer')
    @include('admin.layouts.scripts')
    @include('admin.layouts.sessionSweetAlerts')

</body>
</html>
