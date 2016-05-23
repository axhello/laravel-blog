<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @yield('header')
    <meta name="_token" id="token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/home/main.css">
    <link rel="stylesheet" href="/css/home/media.css">
    <link rel="stylesheet" href="/css/home/atwho.css">
    <script src="/js/home/jquery.min.js"></script>
    <script src="/js/home/caret.min.js"></script>
    <script src="/js/home/atwho.min.js"></script>
</head>
<body :class="sidebar ? 'header-visible' :''">
    @include('home.sidebar')
    @yield('content')
    <div id="titleBar" @click="toggleSidebar"><a href="#header" class="toggle"></a></div>
    <script src="/js/home/main.js"></script>
</body>
</html>