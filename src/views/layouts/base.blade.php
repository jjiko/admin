<!DOCTYPE html>
<html lang="en">
<!--
Hello source reader!
Let's be friends.

If you have questions about anything
you see here, please ask! me@joejiko.com

Leave your console open maybe?
-->
<head>
    <!--
    note: head/body/html tags are supposedly optional now..
    http://www.w3.org/TR/2011/WD-html5-20110525/syntax.html#optional-tags

    but Chrome gave me shit so.. >:[
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @if($page instanceof Jiko\Pages\Page)
        <title>{{ $page->title }}</title>
    @else
        <title>{{ $page->meta->title }}</title>
    @endif

    <link rel="apple-touch-icon" sizes="57x57" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="//cdn.joejiko.com/img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="//cdn.joejiko.com/img/favicons/favicon-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="//cdn.joejiko.com/img/favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="//cdn.joejiko.com/img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="//cdn.joejiko.com/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="//cdn.joejiko.com/img/favicons/favicon-32x32.png" sizes="32x32">
    <meta name="msapplication-TileColor" content="#161121">
    <meta name="msapplication-TileImage" content="//cdn.joejiko.com/img/favicons/mstile-144x144.png">
    @yield('styles')
    <script>
        var JIKO = JIKO || {};
        JIKO.session_user_id = "";
        JIKO.session_user_role = "<?php echo $role ?>";
    </script>

    @yield('scripts.head')
</head>
<body class="<?php echo $agent->isMobile() ? "agent-mobile" : ""; echo $agent->isTablet() ? "agent-tablet" : ""; echo $agent->isDesktop() ? "agent-desktop" : "" ?>">

@yield('app')

{{-- 9/2014: switched to browserify & uglify --}}
<script src="/dist/js/libs.js"></script>
@section('app.core.js')
    @if(App::environment() == 'production')
        <script src="/dist/js/app.js" async></script>
    @else
        <script src="/dist/js/app.js" async></script>
    @endif
@show

{{-- Overrides --}}
@yield('scripts.footer')
<div id="resLoader" hidden>@include('sb.loader')</div>
</body>
</html>