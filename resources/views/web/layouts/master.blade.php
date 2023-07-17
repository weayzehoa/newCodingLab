<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CodingLab - @yield('title')</title>
    @include('web.layouts.css')
    @yield('css')

    @include('web.layouts.js')
    @yield('script')
</head>

<body class="hold-transition sidebar-collapse layout-top-nav layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('web.layouts.topbar')
        @include('web.layouts.sidebar')

        @section('content')
        @show

        @include('web.layouts.footer')
        <div id="particles-js"></div>
    </div>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/web.common.js') }}"></script>
    @yield('CustomScript')
    @yield('JsValidator')

</body>

</html>
