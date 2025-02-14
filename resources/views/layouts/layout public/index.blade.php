<!doctype html>
<html lang="fa" >
    <head>
        <meta charset="UTF-8">
        @php $js='ver=0.0.1';$css='0.0.2'; @endphp
        @php  @endphp

        <link rel="icon" type="image/png" sizes="16x16" href="/image/favicon/16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/image/favicon/32.png">
        <link rel="icon" type="image/png" sizes="48x48" href="/image/favicon/48.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{setting_with_key('logo')->value}}">
        <link rel="icon" type="image/png" sizes="any" href="{{setting_with_key('logo')->value}}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@section('title') - {{setting_with_key('banner')->value}} @show</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name=robots content="INDEX,FOLLOW"/>
        <link rel="stylesheet" href="/public/css/app.rtl.css?{{$css}}">
{{--        <link rel="stylesheet" href="/public/css/app-dark.rtl.css?{{$css}}">--}}
        <link rel="stylesheet" href="/public/css/font.min.css?{{$css}}">
        <link rel="stylesheet" href="/public/css/custom-style.css?{{$css}}">
{{--        <link rel="stylesheet" href="/public/css/Aos.css?{{$css}}">--}}
        @yield('style')
    </head>
    <body>
    @php $menus = \App\Models\Menu::orderBy('sort','desc')->get() @endphp
    <div id="app" class="layout-horizontal">
        @include('layouts.layout public.navbar')
        @include('layouts.layout public.sidebar')
        @yield('content')
        @include('layouts.layout public.footer')
    </div>
{{--        <script type="text/javascript" src="/public/js/Aos.js?{{$js}}"></script>--}}
{{--        <script type="text/javascript" src="/public/js/dark.js?{{$js}}"></script>--}}
        <script type="text/javascript" src="/public/js/app.js?{{$js}}"></script>
    <script type="text/javascript" src="/public/js/custom.js?{{$js}}"></script>
    @yield('script')
    </body>
</html>
