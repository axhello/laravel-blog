<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('header')
    <link rel="stylesheet" href="/css/moon/main.min.css">
    <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    @include('themes.moon.sidebar')
    @yield('content')
    <script src="/js/moon/main.min.js"></script>
</body>
</html>