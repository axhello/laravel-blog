<!DOCTYPE html>
<html>
<head>
    <title>Oops! 404 Error</title>
    <link rel="stylesheet" href="/css/home/errors.css">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Oops!</div>
        <div class="desc">The requested URL was not found on this system</div>
        { <a href="{{ url('/') }}"><span>return</span> {{ url('/') }}</a> }
    </div>
    <div class="footer">
        <img src="/images/404.png" alt="404 notfound">
    </div>
</div>
</body>
</html>
