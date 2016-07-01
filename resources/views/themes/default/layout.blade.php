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
</head>
<body :class="sidebar ? 'header-visible' : ''">
@include('themes.default.sidebar')
@yield('content')
<div id="titleBar" @click="toggleSidebar"><a href="#header" class="toggle"></a></div>
<script src="/js/home/main.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>
</html>